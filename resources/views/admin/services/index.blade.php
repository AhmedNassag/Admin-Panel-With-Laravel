@extends('layouts.master')


@section('title')
    Our Services Category
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Services Category
                        <a href="{{url('service-create')}}" class="btn btn-primary float-right py-2">ADD</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $row)
                                <tr>
                                    <input type="hidden" class="servDelBtn" value="{{$row->id}}">
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->service_name}}</td>
                                    <td>{{$row->service_description}}</td>
                                    <td>
                                        <a href="{{url('service-edit/'.$row->id)}}" class="btn btn-info">EDIT</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger serviceDeleteBtn">DELETE</button>
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
                            url : "/service-delete/"+deleteId,
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
