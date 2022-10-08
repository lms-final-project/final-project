<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Icon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icons = Icon::all();
        return view('dashboard.categories.create' , compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'icon_id'       => $request->icon_id,
        ]);

        return redirect()->route('Category.index');
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
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);


        $category->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'icon_id'       => $request->icon_id,]);

            return redirect()->route('Category.index');
    }


    public function destroy($id)
    {
        $category=Category::findorfail($id);
        $category->delete();
        return redirect()->route('Category.index');
    }
}
