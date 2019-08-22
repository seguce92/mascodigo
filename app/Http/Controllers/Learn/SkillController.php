<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->entity = app(\App\Entities\Learn\Skill::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->q )
            $data = $this->entity->where('name', 'like', '%'.$request->q.'%')->orderByDesc('created_at')->paginate(12);
        else
            $data = $this->entity->orderByDesc('created_at')->paginate(12);
        

        return view('admin::learn.skill.index', [
            'skills'    =>  $data,
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
        return view('admin::learn.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Learn\SkillStoreRequest $request)
    {
        $skill = new $this->entity;
        $skill->name = $request->name;
        $skill->slug = $request->slug;
        $skill->description = $request->description;
        $skill->icon = $request->icon;
        $skill->save();

        session()->flash('message', 'Habilidad guardada');

        return redirect()->route('skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin::learn.skill.show', [
            'skill' =>  $this->entity->find($id)
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
        return view('admin::learn.skill.edit', [
            'skill' =>  $this->entity->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Learn\SkillUpdateRequest $request, $id)
    {
        $skill = $this->entity->find($id);
        $skill->name = $request->name;
        $skill->slug = $request->slug;
        $skill->description = $request->description;
        $skill->icon = $request->icon;
        $skill->save();

        session()->flash('message', 'Habilidad actualizada');

        return redirect()->route('skills.index');
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
