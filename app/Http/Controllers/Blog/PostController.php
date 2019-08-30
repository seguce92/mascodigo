<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->entity = app(\App\Entities\Blog\Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->q ) $data = $this->entity->where('title', 'like', '%'.$request->q.'%')
            ->orderByDesc('created_at')->paginate(12);
        else $data = $this->entity->orderByDesc('created_at')->paginate(12);

        return view('admin::blog.post.index', [
            'posts' =>  $data,
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
        return view('admin::blog.post.create', [
            'categories'    =>  \App\Entities\Blog\Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Blog\PostStoreRequest $request)
    {
        $post = $this->entity;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->image = $request->image;
        $post->is_publish = $request->is_publish;
        $post->author_id = \Auth::id();
        $post->category_id = $request->category_id;
        $post->editor_id = \Auth::id();
        $post->published_at = \Carbon\Carbon::now();
        $post->save();

        session()->flash('message', 'Post Registrado');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->entity->find($id);

        abort_unless($post, 404);

        return view('admin::blog.post.show', [
            'post'  =>  $post
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
        $post = $this->entity->find($id);
        abort_unless($post, 404);

        return view('admin::blog.post.edit', [
            'post'  =>  $post,
            'categories'    =>  \App\Entities\Blog\Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Blog\PostUpdateRequest $request, $id)
    {
        $post = $this->entity->find($id);
        abort_unless($post, 404);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->image = $request->image;
        $post->is_publish = $request->is_publish;
        $post->author_id = \Auth::id();
        $post->category_id = $request->category_id;
        $post->editor_id = \Auth::id();
        $post->published_at = \Carbon\Carbon::now();
        $post->save();

        session()->flash('message', 'Post Actualizado');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->entity->find($id);

        abort_unless($post, 404);

        if ( $post->delete() ) {
            session()->flash('message', 'Post Eliminado exitosamente');
        } else {
            session()->flash('danger', 'Lo siento se produjo un error al eliminar el Post');
        }

        return redirect()->route('posts.index');
    }
}
