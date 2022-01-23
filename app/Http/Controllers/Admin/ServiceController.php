<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ServiceCategory::all();
        return view('admin.services.index')->with('services',$services);
    }


    public function create()
    {
        return view('admin.services.create');
    }


    public function store(Request $request)
    {
        $service = new ServiceCategory();
        $service -> service_name = $request -> input('service_name');
        $service -> service_description = $request -> input('service_description');
        $service -> save();

        Session::flash('statuscode','success');
        return redirect('/services-category')->with('status','Data Added Successfully');
    }


    public function edit($id)
    {
        $service = ServiceCategory::find($id);
        return view('admin.services.edit')->with('service',$service);
    }


    public function update(Request $request, $id)
    {
        $service = ServiceCategory::find($id);
        $service -> service_name = $request -> input('service_name');
        $service -> service_description = $request -> input('service_description');
        $service -> update();

        Session::flash('statuscode','success');
        return redirect('/services-category')->with('status','Data Updated Successfully');
    }


    public function delete($id)
    {
        $service = ServiceCategory::findOrFail($id);
        $service->delete();
        return response()->json(['status' => 'Data Deleted Successfully']);
    }
}
