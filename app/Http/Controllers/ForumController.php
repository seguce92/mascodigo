<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->entity = app(\App\Entities\Forum\Question::class);
    }

    public function index (Request $request) {
        return view('app::discussions', [
            'channel'   =>  $request->channel
        ]);
    }

    public function show ($slug) {

        $discussion = $this->entity->with('user')->where('slug', $slug)->first();

        abort_unless($discussion, 404);

        $discussion->increment('views');

        return view('app::discussion', [
            'discussion'    =>  $discussion
        ]);
    }
}
