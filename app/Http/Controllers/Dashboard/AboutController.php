<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $abouts = About::all();
        return view('dashboard.About.index', compact('abouts'));

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
    public function store(AboutRequest $request)
    {

        About::create([
            'question'          => $request->question,
            'answer'       => $request->answer,
        ]);

        return redirect()->route('dashboard.about.index')->with('success' , 'Question added succesffully');;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, $id)
    {
        $about =About::findOrFail($id);

        $about->update([
            'question'          => $request->question,
            'answer'       => $request->answer
        ]);

        return redirect()->route('dashboard.about.index')->with('success' , 'Question updated successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=About::findorfail($id);
        $about->delete();
        return redirect()->route('dashboard.about.index')->with('danger' , 'Question deleted!');
    }
}
