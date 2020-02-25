<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Resources\ModelResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class DataController extends Controller
{
    /**
     * Model Question class
     *
     * @var \App\Entities\Forum\Question
     */
    protected $question;

    /**
     * Construct
     */
    public function __construct(){
        $this->question = app(\App\Entities\Forum\Question::class);
    }

    /**
     * Get boolean value authenticate
     *
     * @return void
     */
    public function authenticate () {
        $data = \Auth::check() ? \Auth::user() : null;

        return response()->json([
            'data'  =>  [
                'auth'  =>  \Auth::check(),
                'user'  =>  $data
            ]
        ]);
    }

    /**
     * Search box global form lessons
     *
     * @param Request $request
     * @return void
     */
    public function searchGlobal (Request $request) {
        $data = \App\Entities\Learn\Lesson::with(['course.skill'])->get();

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Search box Global form post
     *
     * @param Request $request
     * @return void
     */
    public function searchGlobalPost (Request $request) {
        $data = \App\Entities\Blog\Post::with(['category'])->get();

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Forums
     */

    /**
     * Lists all channels
     *
     * @param Request $request
     * @return void
     */
    public function channels (Request $request) {
        $data = \App\Entities\Forum\Channel::orderBy('title', 'asc')->get();

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Lists all discussions
     *
     * @param Request $request
     * @return void
     */
    public function discussions (Request $request) {
        $data = $this->question->with('user');

        if ( $request->channel ) {
            $channel = \App\Entities\Forum\Channel::where('slug', $request->channel)->first();
            $data = $data->where('channel_id', $channel->id);
        }

        if ( $request->q ) 
            $data = $data->where('title', 'like', '%'.$request->q.'%');

        
        switch ( $request->filter ) {
            case 'desc': $data = $data->orderBy('created_at', 'desc')->get();
                break;
            case 'asc': $data = $data->orderBy('created_at', 'asc')->get();
                break;
            case 'me': $data = $data->where('user_id', \Auth::id())->orderBy('created_at', 'asc')->get();
                break;
            case 'solved': $data = $data->where('solved', 1)->orderBy('created_at', 'desc')->get();
                break;
            case 'unsolved': $data = $data->where('solved', 0)->orderBy('created_at', 'desc')->get();
                break;
            default: $data = $data->orderByDesc('created_at')->get();
        }

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Show discussion
     *
     * @param integer $id
     * @return void
     */
    public function showDiscussion ($id) {
        $data = $this->question->find($id);
        abort_unless($data, 404);

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Stored discussion
     *
     * @param \App\Http\Requests\Forum\QuestionStoreRequest $request
     * @return void
     */
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

    /**
     * List all replies
     *
     * @param String $slug
     * @return void
     */
    public function replies ( $slug ) {
        $discussion = $this->question->where('slug', $slug)->first();

        abort_unless($discussion, 404);

        $replies = \App\Entities\Forum\Reply::with('user')->where('question_id', $discussion->id)->get();

        return (new ModelResource($replies))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Store reply
     *
     * @param \App\Http\Requests\Forum\ReplyStoreRequest $request
     * @return void
     */
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

    /**
     * Store reply solved
     *
     * @param Request $request
     * @return void
     */
    public function storeReplySolve (Request $request) {
        $discussion = $this->question->find($request->discussion);
        $discussion->solved = 1;

        $reply = \App\Entities\Forum\Reply::find($request->reply);
        $reply->solved = 1;

        if ( $discussion->user_id === \Auth::id() && $discussion->save() && $reply->save() )
            $data = collect([
                'status'    =>  true,
                'message'   =>  'Excelente! Mejor Respuesta seleccionada.'
            ]);
        else
            $data = collect([
                'status'    =>  false,
                'message'   =>  'Ups! Se produjo un error. Intentalo nuevamente.'
            ]);


        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }
}
