@extends('layouts.master')


@section('title')
    Our Services List
@endsection


@section('content')
    <!-- Modal -->
    <div class="modal fade" id="serviceslistModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Services List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/services-list-add')}}" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Service Category Name</label>
                            <select name="ser_cate_id" class="form-control" required>
                                <option value="">--Select Service Category--</option>
                                @foreach($service_categories as $service_category)
                                    <option value="{{$service_category->id}}">{{$service_category->service_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Service Category Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Service Category Title">
                        </div>

                        <div class="form-group">
                            <label for="">Service Category Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Service Category Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter Service Price">
                        </div>

                        <div class="form-group">
                            <label for="">Service Category Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="Enter Service Duration">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end Modal-->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Services List
                        <a href="" class="btn btn-primary float-right py-2" data-toggle="modal" data-target="#serviceslistModal">ADD</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services_list as $service_list)
                                <tr>
                                    <input type="hidden" class="servDelBtn" value="{{$service_list->id}}">
                                    <td>{{$service_list->id}}</td>
                                    <td>{{$service_list->service_category->service_name}}</td>
                                    <td>{{$service_list->title}}</td>
                                    <td>{{$service_list->price}}</td>
                                    <td>
                                        <a href="{{url('/services-list-edit/'.$service_list->id)}}" class="btn btn-info">EDIT</a>
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-danger serviceDeleteBtn">DELETE</button>

                                        {{--
                                        <form action="{{url('/services-list-delete/'.$service_list->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </form>
                                        --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $('.serviceDeleteBtn').click(function(e)
            {
                e.preventDefault();
                var deleteId = $(this).closest("tr").find(".servDelBtn").val();
                swal
                ({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) =>
                    {
                        if (willDelete)
                        {
                            var data =
                                {
                                    "_token": $('input[name= _token]').val(),
                                    "id"    : deleteId,
                                };
                            $.ajax({
                                type: "DELETE",
                                url : "/services-list-delete/"+deleteId,
                                data: data,
                                success: function (response)
                                {
                                    swal(response.status,
                                        {
                                            icon: "success",
                                        })
                                        .then((result) =>
                                        {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });
        });
    </script>
@endsection

