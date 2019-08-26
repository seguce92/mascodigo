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

    public function home () {
        return view('admin::home');
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

        abort_unless($skill, 404);

        return view('app::skill', [
            'skill' =>  $skill
        ]);
    }

    public function courses()
    {
        $courses = \App\Entities\Learn\Course::with(['skill', 'lessons'])->where('is_publish', 1)->get();

        $skills = \App\Entities\Learn\Skill::with(['courses.lessons', 'courses.skill'])->get();

        abort_if(!$courses || !$skills, 404);

        return view('app::courses', [
            'courses'   =>  $courses,
            'skills'    =>  $skills
        ]);
    }

    public function course($course)
    {
        $data = \App\Entities\Learn\Course::with(['skill', 'lessons'])->whereSlug($course)->first();

        abort_unless($data, 404);

        return view('app::course', [
            'course'    =>  $data
        ]);
    }

    public function lesson($course, $order)
    {
        $data = \App\Entities\Learn\Course::with(['skill', 'lessons'])->whereSlug($course)->first();
        $lesson = \App\Entities\Learn\Lesson::where('course_id', $data->id)->whereOrder($order)->first();

        abort_unless($lesson || $course, 404);

        return view('app::lesson', [
            'course'    =>  $data,
            'lesson'    =>  $lesson
        ]);
    }

    public function me()
    {
        return view('app::me');
    }

    public function blog (Request $request) {
        return view('app::blog', [
            'posts' =>  \App\Entities\Blog\Post::where('is_publish', 1)->orderByDesc('created_at')->paginate(12)
        ]);
    }

    public function post ($slug) {
        $post = \App\Entities\Blog\Post::whereSlug($slug)->where('is_publish', 1)->first();

        abort_unless($post, 404);

        return view('app::post', [
            'post' => $post
        ]);
    }
}
