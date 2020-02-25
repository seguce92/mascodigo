<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Return home page(index)
     *
     * @return void
     */
    public function home () {

        $news = \App\Entities\Learn\Lesson::whereYear('published_at', date('Y'))->whereMonth('published_at', date('m'))->get();

        $id = $news->map(function ($item) {
            return $item->id;
        });

        $lasted = \App\Entities\Learn\Lesson::whereNotIn('id', $id)->limit(15)->get();

        return view('admin::home', [
            'posts' =>  \App\Entities\Blog\Post::all(),
            'courses'   =>  \App\Entities\Learn\Course::all(),
            'news'      =>  $news,
            'lasted'    =>  $lasted 
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $skills = \App\Entities\Learn\Skill::with('courses.lessons')->get();

        $posts = \App\Entities\Blog\Post::orderByDesc('view_count')->limit(3)->get();

        return view('app::index', [
            'skills'    =>  $skills,
            'posts'     =>  $posts
        ]);
    }

    /**
     * lists all skills
     *
     * @param string $skill
     * @return void
     */
    public function skill ($skill) {
        $skill = \App\Entities\Learn\Skill::with(['courses.lessons', 'courses.skill'])->whereSlug($skill)->first();

        abort_unless($skill, 404);

        return view('app::skill', [
            'skill' =>  $skill
        ]);
    }

    /**
     * Lisrt all courses
     *
     * @return void
     */
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

    /**
     * Show a course and lessons
     *
     * @param string $course
     * @return void
     */
    public function course($course)
    {
        $data = \App\Entities\Learn\Course::with(['skill', 'lessons'])->whereSlug($course)->first();

        abort_unless($data, 404);
        
        if ( \Auth::check() ) {
            $completes = \App\Entities\Learn\Advance::where('user_id', \Auth::id())->get()->map(function ($item) {
                return $item->lesson_id;
            });
            $completes = $completes->toArray();
        } else {
            $completes = [];
        }

        return view('app::course', [
            'course'    =>  $data,
            'completes' =>  $completes
        ]);
    }

    /**
     * show lesson
     *
     * @param string|slug $course
     * @param integer $order
     * @return void
     */
    public function lesson($course, $order)
    {
        $data = \App\Entities\Learn\Course::with(['skill', 'lessons'])->whereSlug($course)->first();
        $lesson = \App\Entities\Learn\Lesson::where('course_id', $data->id)->whereOrder($order)->first();

        abort_unless($lesson || $course, 404);

        $lesson->increment('views');

        if ( \Auth::check() ) {
            $completes = \App\Entities\Learn\Advance::where('user_id', \Auth::id())->get()->map(function ($item) {
                return $item->lesson_id;
            });
        } else {
            $completes = [];
        }

        return view('app::lesson', [
            'course'    =>  $data,
            'lesson'    =>  $lesson,
            'completes' =>  $completes
        ]);
    }

    /**
     * show profile of user
     *
     * @param string $username
     * @return void
     */
    public function me($username)
    {
        $user = \App\User::whereUsername($username)->first();

        return view('app::me', [
            'user'  =>  $user
        ]);
    }

    /**
     * Lists posts
     *
     * @param Request $request
     * @return void
     */
    public function blog (Request $request) {
        return view('app::blog', [
            'posts' =>  \App\Entities\Blog\Post::where('is_publish', 1)->orderByDesc('created_at')->paginate(12)
        ]);
    }

    /**
     * Show post
     *
     * @param string $slug
     * @return void
     */
    public function post ($slug) {
        $post = \App\Entities\Blog\Post::whereSlug($slug)->where('is_publish', 1)->first();

        abort_unless($post, 404);

        $post->increment('view_count');

        $related = \App\Entities\Blog\Post::where('category_id', $post->category_id)
            ->where('is_publish', 1)
            ->inRandomOrder()->limit(3)->get();

        return view('app::post', [
            'post'  =>  $post,
            'posts' =>  $related
        ]);
    }

    /**
     * Show a lists all post of category
     *
     * @param string $slug
     * @return void
     */
    public function category ($slug) {

        $category = \App\Entities\Blog\Category::whereSlug($slug)->first();
        abort_unless($category, 404);
        $posts = \App\Entities\Blog\Post::where('category_id', $category->id)->paginate(12);
        return view('app::category', [
            'category'  =>  $category,
            'posts'     =>  $posts
        ]);
    }
}
