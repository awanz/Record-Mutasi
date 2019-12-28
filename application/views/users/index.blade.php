@extends('layouts.master')

@section('content')
@if (get_instance()->session->flashdata("alert_message"))
<div style="text-align:center;" class="alert @if (get_instance()->session->flashdata("alert_status")) alert-success @else alert-danger @endif">
    {{get_instance()->session->flashdata("alert_message")}}
</div>
@endif

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    USERS
                </h2>
                <ul class="header-dropdown m-r--5">
                    <a href="{{base_url('users/add')}}"><button type="button" class="btn btn-primary waves-effect">TAMBAH DATA</button></a>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Last Login</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Last Login</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($dataUsers as $data)
                            <tr>
                                <td>{{$data->username}}</td>
                                <td>{{$data->full_name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>@if ($data->role == 1) Administrator @elseif ($data->role == 2) Viewer @endif</td>
                                <td>{{$data->last_login}}</td>
                                <td>@if ($data->status) <b style="color:green">Active</b> @else <b style="color:red">Deactive</b> @endif</td>
                                <td><a href="{{base_url('users/'.$data->user_id.'/edit')}}"><button type="button" class="btn btn-success waves-effect">EDIT</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection