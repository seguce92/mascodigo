<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->middleware('permission:listar canales|crear canales|editar canales|eliminar canales', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear canales', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar canales', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar canales', ['only' => ['destroy']]);

        $this->entity = app(\App\Entities\Forum\Channel::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->q ) $data = $this->entity->where('title', 'like', '%'.$request->q.'%')
            ->orderByDesc('created_at')
            ->paginate(12);
        else $data = $this->entity->orderByDesc('created_at')->paginate(12);


        return view('admin::forum.channel.index', [
            'channels'  =>  $data,
            'q'         =>  $request->q 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::forum.channel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Forum\ChannelStoreRequest $request)
    {
        $channel = $this->entity;
        $channel->title =   $request->title;
        $channel->slug  =   $request->slug;
        $channel->icon  =   $request->icon;
        $channel->color =   $request->color;
        
        if ( $channel->save() )
            session()->flash('message', 'Canal Registrado');
        else
            session()->flash('danger', 'Error al Registrar Canal');

        return redirect()->route('channels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $channel = $this->entity->find($id);
        
        abort_unless($channel, 404);

        return view('admin::forum.channel.edit', [
            'channel'   =>  $channel
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
        $channel = $this->entity->find($id);
        
        abort_unless($channel, 404);

        return view('admin::forum.channel.edit', [
            'channel'   =>  $channel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Forum\ChannelUpdateRequest $request, $id)
    {
        $channel = $this->entity->find($id);
        $channel->title =   $request->title;
        $channel->slug  =   $request->slug;
        $channel->icon  =   $request->icon;
        $channel->color =   $request->color;
        
        if ( $channel->save() )
            session()->flash('message', 'Canal Actualizado');
        else
            session()->flash('danger', 'Error al Actualizar Canal');

        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel = $this->entity->find($id);

        abort_unless($channel, 404);

        if ( $channel->delete() ) {
            session()->flash('message', 'Canal Eliminado exitosamente');
        } else {
            session()->flash('danger', 'Lo siento se produjo un error al eliminar el Canal');
        }

        return redirect()->route('channels.index');
    }
}
