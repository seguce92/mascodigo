<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->entity = app(\App\Entities\Learn\Course::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->q ) $data = $this->entity->where('title', 'like', '%'.$request->q.'%')->orWhere('content', 'like', '%'.$request->q.'%')->orderByDesc()->paginate(12);
        else $data = $this->entity->orderByDesc('created_at')->paginate(12);

        return view('admin::learn.course.index', [
            'courses'   =>  $data,
            'q' =>  $request->q
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::learn.course.create', [
            'skills'    =>  \App\Entities\Learn\Skill::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Learn\CourseStoreRequest $request)
    {
        $course = new $this->entity;
        $course->title = $request->title;
        $course->slug = $request->slug;
        $course->icon = $request->icon;
        $course->color = $request->color;
        $course->content = $request->content;
        $course->is_publish = $request->is_publish ? 1 : 0;
        $course->level = $request->level;
        $course->skill_id = $request->skill_id;
        $course->author_id = \Auth::id();
        $course->editor_id = $request->editor_id;
        $course->published_at = $request->published_at;
        $course->save();

        session()->flash('message', 'Curso registrado.');

        return redirect()->route('courses.show', $course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin::learn.course.create', [
            'course'    =>  $this->entity->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin::learn.course.edit', [
            'course'    =>  $this->entity->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Learn\CourseUpdateRequest $request, $id)
    {
        $course = $this->entity->find($id);
        $course->title = $request->title;
        $course->slug = $request->slug;
        $course->icon = $request->icon;
        $course->color = $request->color;
        $course->content = $request->content;
        $course->is_publish = $request->is_publish;
        $course->level = $request->level;
        $course->skill_id = $request->skill_id;
        $course->author_id = $request->author_id;
        $course->editor_id = $request->editor_id;
        $course->published_at = $request->published_at;
        $course->save();

        session()->flash('message', 'Curso actualizado.');

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
