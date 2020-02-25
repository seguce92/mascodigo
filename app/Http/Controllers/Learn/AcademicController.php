<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resources\ModelResource as Resource;
use App\Entities\Learn\Favorite;
use Illuminate\Support\Collection;
use App\Entities\Learn\Advance;
use App\Entities\Learn\History;

class AcademicController extends Controller
{
    /**
     * @var \App\Entities\Learn\Course
     */
    protected $course;

    /**
     * Construct
     */
    public function __construct () {
        $this->course = app(\App\Entities\Learn\Course::class);
    }
    
    /**
     * Return view courses
     *
     * @return void
     */
    public function index () {
        return view('admin::learn.academic.index', [
            'courses'   =>  $this->course->all()
        ]);
    }

    /**
     * Lists all courses
     *
     * @return void
     */
    public function courses () {
        $data = $this->course->with('skill')->where('is_publish', 1)->orderBy('published_at', 'desc')->get();
        
        $data = $data->map(function ($item, $key) {
            return [          
                "id"    =>  $item->hashid,
                "title" =>  $item->title,
                "slug"  =>  $item->slug,
                "icon"  =>  $item->icon,
                "color" =>  $item->color,
                "published_at"  =>  $item->published_at,
                "published_human"   =>  $item->published_human,
                "skill" =>  [
                    "id"    =>  hashid_encode($item->skill->id),
                    "name"  =>  $item->skill->name,
                    "slug"  =>  $item->skill->slug
                ]
            ];
        });

        return (new Resource(
            $data
        ));
    }

    /**
     * Lists courses and lessons in progress
     *
     * @param Request $request
     * @return void
     */
    public function advance (Request $request) {
        $keys = $request->user()->advances->pluck('id');

        $data = \App\Entities\Learn\Advance::with('course.skill')->whereIn('id', $keys)->orderBy('created_at', 'desc')->get();

        $data = $data->unique('course')->map(function ($item, $key) {
            return [
                "id" =>  $item->hashid,
                "created_at"    =>  $item->created_at,
                "created_human" =>  $item->created_human,
                "progress"      =>  0,  
                "course"    =>  [
                    "title" =>  $item->course->title,
                    "slug"  =>  $item->course->slug,
                    "icon"  =>  $item->course->icon,
                    "color" =>  $item->course->color,
                    "skill" =>  [
                        "name"  =>  $item->course->skill->name,
                        "slug"  =>  $item->course->skill->slug,
                    ]
                ]
            ];
        });

        return (new Resource(
            $data
        ));
    }

    /**
     * Lists lessons completed
     *
     * @param Request $request
     * @return void
     */
    public function completed (Request $request) {
        $keys = $request->user()->advances->pluck('id');

        $data = \App\Entities\Learn\Advance::with('course.skill')->whereIn('id', $keys)->orderBy('created_at', 'desc')->get();

        $data = $data->map(function ($item, $key) {
            return [
                'id'            =>  $item->hashid,
                'lesson'        =>  $item->lesson->title,
                'lesson_order'  =>  $item->lesson->order,
                'course'        =>  $item->lesson->course->title,
                'course_slug'   =>  $item->lesson->course->slug,
                'course_icon'   =>  $item->lesson->course->icon,
                'course_color'  =>  $item->lesson->course->color,
                'skill'         =>  $item->lesson->course->skill->name,
                'skill_slug'    =>  $item->lesson->course->skill->slug,
                'date'          =>  $item->created_human
            ];
        });

        return (new Resource(
            $data
        ));
    }


    /**
     * List favorite
     *
     * @param Request $request
     * @return void
     */
    public function favorites (Request $request) {
        $data = Favorite::with('lesson.course.skill')->where('user_id', \Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        
        $data = $data->map(function ($item, $key) {
            return [
                'id'        =>  $item->hashid,
                'lesson'    =>  $item->lesson->title,
                'lesson_order'  =>  $item->lesson->order,
                'course'    =>  $item->lesson->course->title,
                'course_slug'   =>  $item->lesson->course->slug,
                'course_icon'   =>  $item->lesson->course->icon,
                'course_color'  =>  $item->lesson->course->color,
                'skill'         =>  $item->lesson->course->skill->name,
                'skill_slug'    =>  $item->lesson->course->skill->slug,
                'date'          =>  $item->created_human
            ];
        });

        return (new Resource(
            $data
        ));
    }

    /**
     * Lists lessons and data of favorites
     *
     * @param Request $request
     * @return void
     */
    public function history (Request $request) {
        $keys = $request->user()->histories->pluck('id');

        $data = \App\Entities\Learn\History::with('lesson.course.skill')
            ->whereIn('id', $keys)->orderBy('created_at', 'desc')
            ->get();

        $data = $data->map(function ($item, $key) {
            return [
                'id'            =>  $item->hashid,
                'lesson'        =>  $item->lesson->title,
                'lesson_order'  =>  $item->lesson->order,
                'course'        =>  $item->lesson->course->title,
                'course_slug'   =>  $item->lesson->course->slug,
                'course_icon'   =>  $item->lesson->course->icon,
                'course_color'  =>  $item->lesson->course->color,
                'skill'         =>  $item->lesson->course->skill->name,
                'skill_slug'    =>  $item->lesson->course->skill->slug,
                'date'          =>  $item->created_human
            ];
        });

        return (new Resource(
            $data
        ));
    }


    /**
     * Lists lessons favorites
     *
     * @param [type] $id
     * @return void
     */
    public function loadFavorite ($id) {
        $data = Favorite::where('user_id', \Auth::id())
            ->where('lesson_id', $id)
            ->first() ? true : false;

        return response()->json([
            'data'  =>  $data
        ]);
    }

    /**
     * Store lesson in favorites
     *
     * @param Request $request
     * @return void
     */
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

    /**
     * Store lesson in history
     *
     * @param Request $request
     * @return void
     */
    public function storeHistory (Request $request) {
        $item = new History();
        $item->lesson_id = $request->lesson;
        $item->user_id = \Auth::id();
        $item->save();

        return (new Resource(
            $item
        ));
    }

    /**
     * Store completed lesson
     *
     * @param Request $request
     * @return void
     */
    public function storeCompleted (Request $request) {
        $complete = Advance::where('lesson_id', $request->lesson)
            ->where('course_id', $request->course)
            ->where('user_id', \Auth::id())->first();

        if ( $complete ) {
            return (new Resource(
                $complete
            ));
        }

        $item = new Advance();
        $item->lesson_id = $request->lesson;
        $item->course_id = $request->course;
        $item->user_id = \Auth::id();
        if ( $item->save() ) {
            $lesson = \App\Entities\Learn\Lesson::find($request->lesson);
            $user = \App\User::find(\Auth::id());
            $user->xp = $user->xp + $lesson->points;
            $user->save();
        }

        return (new Resource(
            $item
        ));
    } 

    /**
     * List like lessons
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function loadLiked (Request $request, $id) {
        $data = Favorite::where('user_id', $request->user()->id)->where('lesson_id', $id)->first();

        return (new Resource(
            $data
        ));
    }
}
