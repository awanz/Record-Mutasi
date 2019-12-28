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
                <div class="body">
                    <div class="row clearfix">
                        <form action="{{base_url('record_mutasi/fillter')}}" method="get">
                        <div class="col-sm-3">
                            <label for="auto_scrape">Fillter by Bank</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select id="bank_name" class="form-control show-tick" name="bank_name">
                                        <option value="ALL" @if ($bank_name == 'ALL') SELECTED @endif>ALL</option>
                                        <option value="BRI" @if ($bank_name == 'BRI') SELECTED @endif>BRI</option>
                                        <option value="BCA" @if ($bank_name == 'BCA') SELECTED @endif>BCA</option>
                                        <option value="BNI" @if ($bank_name == 'BNI') SELECTED @endif>BNI</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <h2 class="card-inside-title">Fillter by Date</h2>
                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                <div class="form-line">
                                    <input type="text" value="{{$start_date}}" name="start_date" class="form-control" placeholder="Date start...">
                                </div>
                                <span class="input-group-addon">to</span>
                                <div class="form-line">
                                    <input type="text" value="{{$end_date}}" name="end_date" class="form-control" placeholder="Date end...">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group button-demo">
                                <button type="submit" class="btn btn-primary waves-effect">FILLTER</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Bank Name</th>
                                    <th>Account ID</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Total</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Bank Name</th>
                                    <th>Account ID</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Total</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($dataMutasi as $data)
                                <tr>
                                    <td>{{$data->bank_name}}</td>
                                    <td>{{$data->account_id}}</td>
                                    <td>{{$data->jenis}}</td>
                                    <td>{{$data->keterangan}}</td>
                                    <td>{{$data->jumlah}}</td>
                                    <td>{{$data->waktu}}</td>
                                    
                                    <td><a href="{{base_url('record_mutasi/'.$data->id.'/detail')}}"><button type="button" class="btn btn-primary waves-effect">DETAIL</button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection