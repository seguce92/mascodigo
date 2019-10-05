<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->middleware('permission:listar categorias|crear categorias|editar categorias|eliminar categorias', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear categorias', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar categorias', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar categorias', ['only' => ['destroy']]);

        $this->entity = app(\App\Entities\Blog\Category::class);
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

        return view('admin::blog.category.index', [
            'categories'    =>  $data,
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
        return view('admin::blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Blog\CategoryStoreRequest $request)
    {
        $category = $this->entity;
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->save();

        session()->flash('message', 'Categoría Registrada');

        return redirect()->route('categories.show', $category->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->entity->find($id);

        abort_unless($category, 404);

        return view('admin::blog.category.show', [
            'category'  =>  $category
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
        $category = $this->entity->find($id);
        abort_unless($category, 404);

        return view('admin::blog.category.edit', [
            'category'  =>  $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Blog\CategoryUpdateRequest $request, $id)
    {
        $category = $this->entity->find($id);
        abort_unless($category, 404);
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->save();

        session()->flash('message', 'Categoría Actualizada');

        return redirect()->route('categories.index');
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
