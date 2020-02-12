<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resources\ModelResource as Resource;
use App\Entities\Learn\Favorite;

class AcademicController extends Controller
{
    protected $course;

    public function __construct () {
        $this->course = app(\App\Entities\Learn\Course::class);
    }
    
    public function index () {
        return view('admin::learn.academic.index', [
            'courses'   =>  $this->course->all()
        ]);
    }

    public function store (Request $request) {

    }


    public function courses () {
        $data = $this->course->with('skill')->orderBy('published_at', 'desc')->get();

        return (new Resource(
            $data
        ));
    }

    public function advance (Request $request) {
        $keys = $request->user()->advances->pluck('id');

        $data = \App\Entities\Learn\Advance::with('course.skill')->whereIn('id', $keys)->orderBy('created_at', 'desc')->get();

        return (new Resource(
            $data->unique('course')
        ));
    }

    public function completed (Request $request) {
        $data = $request->user()->completes->sortByDesc('created_at');

        return (new Resource(
            $data
        ));
    }


    public function favorites (Request $request) {
        $data = Favorite::with('lesson.course.skill')->where('user_id', \Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return (new Resource(
            $data
        ));
    }

    public function history (Request $request) {
        $data = $request->user()->histories->sortByDesc('created_at');

        return (new Resource(
            $data
        ));
    }


    public function loadFavorite ($id) {
        $data = Favorite::where('user_id', \Auth::id())
            ->where('lesson_id', $id)
            ->first() ? true : false;

        return response()->json([
            'data'  =>  $data
        ]);
    }

    public function storeFavorite (Request $request) {
        $favorite = Favorite::where('user_id', \Auth::id())
            ->where('lesson_id', $request->lesson)
            ->first();

        if ( !$favorite ) {
            $favorite = new Favorite();
            $favorite->user_id = \Auth::id();
            $favorite->lesson_id = $request->lesson;
            $favorite->save();

            return response()->json([
                'data'  =>  true
            ]);
        }

        return response()->json([
            'data'  =>  $favorite->delete() ? false : true
        ]);
    }

    public function loadLiked (Request $request, $id) {
        $data = Favorite::where('user_id', $request->user()->id)->where('lesson_id', $id)->first();

        return (new Resource(
            $data
        ));
    }
}
