<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Icon;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = Icon::all();
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories', 'icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name'          => $request->name,
            'icon_id'       => $request->icon_id,
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $icons = Icon::all();

        return view('dashboard.Categories.edit' , compact('category' , 'icons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'name'          => $request->name,
            'icon_id'       => $request->icon_id
        ]);

        return redirect()->route('category.index');
    }


    public function destroy($id)
    {
        $category=Category::findorfail($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
