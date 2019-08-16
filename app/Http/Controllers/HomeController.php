<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $skills = \App\Entities\Learn\Skill::with('courses.lessons')->get();

        return view('app::index', [
            'skills'    =>  $skills
        ]);
    }

    public function skill ($skill) {
        $skill = \App\Entities\Learn\Skill::with(['courses.lessons', 'courses.skill'])->whereSlug($skill)->first();

        return view('app::skill', [
            'skill' =>  $skill
        ]);
    }

    public function courses()
    {
        return view('app::courses');
    }

    public function course($course)
    {
        $data = \App\Entities\Learn\Course::with(['skill', 'lessons'])->whereSlug($course)->first();

        return view('app::course', [
            'course'    =>  $data
        ]);
    }

    public function lesson($course, $order)
    {
        $data = \App\Entities\Learn\Course::whereSlug($course)->first();
        $lesson = \App\Entities\Learn\Lesson::where('course_id', $data->id)->whereOrder($order)->first();

        return view('app::lesson', [
            'course'    =>  $data,
            'lesson'    =>  $lesson
        ]);
    }

    public function me()
    {
        return view('app::me');
    }
}
