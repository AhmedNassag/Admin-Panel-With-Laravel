<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServicesList;
use Illuminate\Http\Request;

class ServicelistController extends Controller
{
    public function index()
    {
        $service_categories = ServiceCategory::all();
        $services_list      = ServicesList::all();

        return view('admin.services-list.index')
            ->with('service_categories',$service_categories)
            ->with('services_list',$services_list)
        ;
    }


    public function store(Request $request)
    {
        $service_list = new ServicesList();
        $service_list->ser_cate_id = $request->input('ser_cate_id');
        $service_list->title       = $request->input('title');
        $service_list->description = $request->input('description');
        $service_list->price       = $request->input('price');
        $service_list->duration    = $request->input('duration');
        $service_list-> save();

        return redirect()->back()->with('status','Your Data Added Successfully');
    }


    public function edit($id)
    {
        $service_list       = ServicesList::find($id);
        $service_categories = ServiceCategory::all();
        return view('admin.services-list.edit')
            ->with('service_list',$service_list)
            ->with('service_categories',$service_categories)
        ;
    }


    public function update(Request $request,$id)
    {
        $service_list = ServicesList::find($id);
        $service_list -> ser_cate_id = $request->input('ser_cate_id');
        $service_list -> title       = $request->input('title');
        $service_list -> description = $request->input('description');
        $service_list -> price       = $request->input('price');
        $service_list -> duration    = $request->input('duration');
        $service_list ->update();

        return redirect('/services-list')->with('status','Your Data Updated Successfully');
    }


    public function delete($id)
    {
        $service = ServicesList::findOrFail($id);
        $service->delete();

        return response()->json(['status' => 'Data Deleted Successfully']);
    }

}
