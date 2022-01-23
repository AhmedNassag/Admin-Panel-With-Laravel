@extends('layouts.master')

@section('title')
    Our Services List
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Services List Edit</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('/services-list-update/'.$service_list->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Service Category Name</label>
                                <select name="ser_cate_id" class="form-control" required>
                                    <option value="{{$service_list->ser_cate_id}}">{{$service_list->service_category->service_name}}</option>
                                    @foreach($service_categories as $service_category)
                                        <option value="{{$service_category->id}}">{{$service_category->service_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Service Category Title</label>
                                <input type="text" name="title" class="form-control" value="{{$service_list->title}}" placeholder="Enter Service Category Title">
                            </div>

                            <div class="form-group">
                                <label for="">Service Category Description</label>
                                <textarea name="description" class="form-control" rows="5">{{$service_list->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Service Category Price</label>
                                <input type="number" name="price" class="form-control" value="{{$service_list->price}}" placeholder="Enter Service Price">
                            </div>

                            <div class="form-group">
                                <label for="">Service Category Duration</label>
                                <input type="text" name="duration" class="form-control" value="{{$service_list->duration}}" placeholder="Enter Service Duration">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
