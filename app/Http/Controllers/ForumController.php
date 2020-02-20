<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Entity variable
     *
     * @var \App\Entities\Forum\Question
     */
    protected $entity;

    /**
     * Construct
     */
    public function __construct () {
        $this->entity = app(\App\Entities\Forum\Question::class);
    }

    /**
     * Return view indes discussions
     *
     * @param Request $request
     * @return void
     */
    public function index (Request $request) {
        return view('app::discussions', [
            'channel'   =>  $request->channel
        ]);
    }

    /**
     * Show view to discussion specified
     *
     * @param [type] $slug
     * @return void
     */
    public function show ($slug) {

        $discussion = $this->entity->with('user')->where('slug', $slug)->first();

        abort_unless($discussion, 404);

        $discussion->increment('views');

        return view('app::discussion', [
            'discussion'    =>  $discussion
        ]);
    }
}
