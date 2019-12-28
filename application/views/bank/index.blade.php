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
                    MASTER BANK
                </h2>
                <ul class="header-dropdown m-r--5">
                    @if ($userdata['role'] == 1)
                    <a href="{{base_url('bank/add')}}"><button type="button" class="btn btn-primary waves-effect">TAMBAH DATA</button></a>
                    @endif
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Bank Name</th>
                                <th>Account ID</th>
                                <th>Account Name</th>
                                <th>Status</th>
                                <th>Auto Scrape</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Bank Name</th>
                                <th>Account ID</th>
                                <th>Account Name</th>
                                <th>Status</th>
                                <th>Auto Scrape</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($dataMasterBank as $data)
                            <tr>
                                <td>{{$data->bank_name}}</td>
                                <td>{{$data->account_id}}</td>
                                <td>{{$data->account_name}}</td>
                                <td>@if ($data->status) <b style="color:green">Active</b> @else <b style="color:red">Deactive</b> @endif</td>
                                <td>@if ($data->auto_scrape) <b style="color:green">Active</b> @else <b style="color:red">Deactive</b> @endif</td>
                                @if ($userdata['role'] == 1)
                                <td><a href="{{base_url('bank/'.$data->master_bank_id.'/edit')}}"><button type="button" class="btn btn-success waves-effect">EDIT</button></a></td>
                                @else
                                <td><a href="{{base_url('bank/'.$data->master_bank_id.'/view')}}"><button type="button" class="btn btn-primary waves-effect">VIEW</button></a></td>
                                @endif
                                
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