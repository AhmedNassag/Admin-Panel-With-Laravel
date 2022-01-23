@extends('layouts.master')


@section('title')
    About Us
@endsection


@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/save-aboutus" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" name="title" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sub-Title:</label>
                            <input type="text" name="subtitle" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea name="description" class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About Us Edit</h4>
                    <form action="{{url('/aboutus-update/'.$aboutus->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="text" name="title" class="form-control" id="recipient-name" value="{{$aboutus->title}}">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Sub-Title:</label>
                                <input type="text" name="subtitle" class="form-control" id="recipient-name" value="{{$aboutus->subtitle}}">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea name="description" class="form-control" id="message-text">{{$aboutus->description}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{url('abouts')}}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
