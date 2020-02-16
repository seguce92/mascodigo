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
        return view('app::forum');
    }

    public function discussion ($slug) {
        return view('app::discussion');
    }
}
