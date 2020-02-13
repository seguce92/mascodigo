<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->middleware('permission:listar lecciones|crear lecciones|editar lecciones|eliminar lecciones', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear lecciones', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar lecciones', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar lecciones', ['only' => ['destroy']]);

        $this->entity = app(\App\Entities\Learn\Lesson::class);
    }

    public function show ($id) {
        return view('admin::learn.lesson.show', [
            'lesson'    =>  $this->entity->find($id)
        ]);
    }

    public function store (\App\Http\Requests\Learn\LessonStoreRequest $request) {
        $lesson             =   new $this->entity;
        $lesson->title      =   $request->title;
        $lesson->url        =   $request->url;
        $lesson->content    =   $request->content;
        $lesson->repository =   $request->repository;
        $lesson->is_publish =   $request->is_publish;
        $lesson->is_private =   $request->is_private;
        $lesson->is_premium =   $request->is_premium;
        $lesson->duration   =   $request->duration;
        $lesson->points     =   $request->points;
        $lesson->order      =   $request->order;
        $lesson->course_id  =   $request->course_id;
        $lesson->author_id  =   \Auth::id();
        $lesson->editor_id  =   \Auth::id();
        $lesson->published_at   =   $request->is_publish == 1 ? \Carbon\Carbon::now() : null;
        $lesson->save();

        session()->flash('message', 'Lección registrado.');

        return redirect()->route('courses.show', $request->course_id);
    }

    public function update (\App\Http\Requests\Learn\LessonStoreRequest $request, $id) {
        $lesson             =   $this->entity->find($id);
        $lesson->title      =   $request->title;
        $lesson->url        =   $request->url;
        $lesson->content    =   $request->content;
        $lesson->repository =   $request->repository;
        $lesson->is_publish =   $request->is_publish;
        $lesson->is_private =   $request->is_private;
        $lesson->is_premium =   $request->is_premium;
        $lesson->duration   =   $request->duration;
        $lesson->points     =   $request->points;
        $lesson->order      =   $request->order;
        $lesson->editor_id  =   \Auth::id();
        $lesson->published_at   =   $request->is_publish == 1 ? \Carbon\Carbon::now() : null;
        $lesson->save();

        session()->flash('message', 'Lección actualizado.');

        return redirect()->route('courses.show', $request->course_id);
    }

    public function destroy ($id) {
        $lesson = $this->entity->find($id);

        if ( $lesson->delete() )
            return response()->json([
                'data'  =>  '',
                'status'    =>  200
            ]);
        
        return response()->json([
            'data'  =>  '',
            'status'    =>  503
        ]);
    }
}
