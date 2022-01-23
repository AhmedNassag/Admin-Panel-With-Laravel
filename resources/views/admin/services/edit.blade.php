@extends('layouts.master')


@section('title')
    Our Service
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Edit Services Category
                        <a href="{{url('services-category')}}" class="btn btn-primary float-right py-2">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('service-update/'.$service->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Services Category Name</label>
                                    <input type="text" name="service_name" class="form-control" value="{{$service->service_name}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Services Category Description</label>
                                    <textarea type="text" name="service_description" class="form-control">{{$service->service_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
