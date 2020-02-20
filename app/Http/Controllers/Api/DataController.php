<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use \App\Resources\ModelResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class DataController extends Controller
{
    protected $question;

    public function __construct(){
        $this->question = app(\App\Entities\Forum\Question::class);
    }

    public function authenticate () {
        $data = \Auth::check() ? \Auth::user() : null;

        return response()->json([
            'data'  =>  [
                'auth'  =>  \Auth::check(),
                'user'  =>  $data
            ]
        ]);
    }

    public function searchGlobal (Request $request) {
        $data = \App\Entities\Learn\Lesson::with(['course.skill'])->get();

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    public function searchGlobalPost (Request $request) {
        $data = \App\Entities\Blog\Post::with(['category'])->get();

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Forums
     */
    public function channels (Request $request) {
        $data = \App\Entities\Forum\Channel::orderBy('title', 'asc')->get();

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    public function discussions (Request $request) {
        $data = $this->question->with('user');

        if ( $request->channel ) {
            $channel = \App\Entities\Forum\Channel::where('slug', $request->channel)->first();
            $data = $data->where('channel_id', $channel->id);
        }

        if ( $request->q ) 
            $data = $data->where('title', 'like', '%'.$request->q.'%');

        $data = $data->orderByDesc('created_at')->get();

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    public function storeDiscussion (\App\Http\Requests\Forum\QuestionStoreRequest $request) {
        $channel = \App\Entities\Forum\Channel::where('slug', $request->channel)->first();

        if ( $channel ) {
            $discussion = new \App\Entities\Forum\Question();
            $discussion->title      =   $request->title;
            $discussion->slug       =   Str::slug($request->title);
            $discussion->content    =   $request->content;
            $discussion->channel_id =   $channel->id;
            $discussion->user_id    =   \Auth::id();
            $discussion->save();
        } else {
            $discussion = new \App\Entities\Forum\Question();
            $discussion->title      =   $request->title;
            $discussion->slug       =   Str::slug($request->title);
            $discussion->content    =   $request->content;
            $discussion->channel_id =   1;
            $discussion->user_id    =   \Auth::id();
            $discussion->save();
        }

        return (new ModelResource($discussion))
            ->response()
            ->setStatusCode(201);
    }

    public function replies ( $slug ) {
        $discussion = $this->question->where('slug', $slug)->first();

        abort_unless($discussion, 404);

        $replies = \App\Entities\Forum\Reply::with('user')->where('question_id', $discussion->id)->get();

        return (new ModelResource($replies))
            ->response()
            ->setStatusCode(201);
    }

    public function storeReply (\App\Http\Requests\Forum\ReplyStoreRequest $request) {

        $reply = new \App\Entities\Forum\Reply();
        $reply->content     =   $request->content;
        $reply->question_id =   $request->question_id;
        $reply->mention_id  =   $request->mention != null && strlen($request->mention) > 0 ? $request->mention : null;
        $reply->user_id     =   \Auth::id();
        $reply->save();

        return (new ModelResource($reply))
            ->response()
            ->setStatusCode(201);
    }
}
