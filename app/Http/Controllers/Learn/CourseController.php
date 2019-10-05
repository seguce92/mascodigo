<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->middleware('permission:listar cursos|crear cursos|editar cursos|eliminar cursos', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear cursos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar cursos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar cursos', ['only' => ['destroy']]);

        $this->entity = app(\App\Entities\Learn\Course::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->q ) $data = $this->entity->where('title', 'like', '%'.$request->q.'%')
            ->orWhere('content', 'like', '%'.$request->q.'%')->orderByDesc('created_at')->paginate(12);
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
        $skills = \App\Entities\Learn\Skill::all()->count();

        if ( $skills == 0 ) {
            session()->flash('danger', 'Primero debe registrar un Habilidad.');
            return redirect()->back();
        }


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
        $course->icon = $request->image;
        $course->color = $request->color;
        $course->content = $request->content;
        $course->is_publish = $request->is_publish;
        $course->level = $request->level;
        $course->skill_id = $request->skill_id;
        $course->author_id = \Auth::id();
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
        return view('admin::learn.course.show', [
            'course'    =>  $this->entity->find($id),
            'skills'    =>  \App\Entities\Learn\Skill::all(),
            'order'     =>  $this->entity->find($id)->lessons->count() + 1
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
            'course'    =>  $this->entity->find($id),
            'skills'    =>  \App\Entities\Learn\Skill::all()
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
        $course->icon = $request->image;
        $course->color = $request->color;
        $course->content = $request->content;
        $course->is_publish = $request->is_publish;
        $course->level = $request->level;
        $course->skill_id = $request->skill_id;
        $course->editor_id = \Auth::id();
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
        $course = $this->entity->find($id);

        if ( $course->lessons->count() == 0 && $course->delete() )
            session()->flash('message', 'Curso Eliminado');
        else 
            session()->flash('danger', 'Lo siento se produjo un error al ejecutar petición');

        return redirect()->route('courses.index');
    }
}
