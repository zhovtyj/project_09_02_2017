<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Session;
use Image;
use Storage;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(100);
        return view('admin.service.index')->withServices($services);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $service = New Service;

        $service->name = $request->name;
        $service->price = $request->price;
        $service->old_price = $request->old_price;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        if ($request->active == 'checked'){
            $service->active = 1;
        }
        else{
            $service->active = 0;
        }

        if ($request->hasfile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('upload_images/services/'.$filename);
            $img = Image::make($image);
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($location);

            $service->image = $filename;
        }

        $service->save();

        Session::flash('success', 'Service created successfully');

        return redirect()->route('service.show', $service->id);
    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.service.show')->withService($service);
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit')->withService($service);
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
        //
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
