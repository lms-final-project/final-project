<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;



class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::all();
        return view ('dashboard.service.index',compact('services'));
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
    public function store(StoreServiceRequest $request)
    {
        if($request->hasFile('image')){
            $file=$request->file('image');
            $path=$file->store('Services','public');


        }
        Service::create([
            'title'          => $request->title,
            'description'       => $request->description,
            'image'=>$path,
        ]);

        return redirect()->route('dashboard.service.index')->with('success' , 'Service added succesffully');
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
    public function update(UpdateServiceRequest $request, Service $service)
    {

//dd($request->all());

$old_image = $service->image;
if($request->hasFile('image')){
    $file = $request->file('image');
    $path = $file->update('Services' , 'public');
    dd($path);
}

$service->update([
'image'   => $path,
'title'                 => $request->title,
'description'           => $request->description,


]);
if($old_image && $request->hasFile('image')){
    Storage::disk('public')->delete($old_image);
}
        return redirect()->route('dashboard.service.index')->with('success' , 'Service updated succesffully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        $service->delete();
        return redirect()->route('dashboard.service.index')->with('danger' , 'Service deleted succesffully');
    }
}
