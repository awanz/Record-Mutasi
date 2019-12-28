@extends('layouts.master')

@section('content')
@if (get_instance()->session->flashdata("alert_message"))
<div style="text-align:center;" class="alert @if (get_instance()->session->flashdata("alert_status")) alert-success @else alert-danger @endif">
    {{get_instance()->session->flashdata("alert_message")}}
</div>
@endif

<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="bank_name">Bank Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="bank_name" value="{{$dataMutasi['bank_name']}}" name="bank_name" type="text" class="form-control" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="account_id">Account ID</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="account_id" value="{{$dataMutasi['account_id']}}" name="account_id" type="text" class="form-control" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="jumlah">Total</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="jumlah" value="{{$dataMutasi['jumlah']}}" name="jumlah" type="text" class="form-control" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="jenis">Type</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="jenis" value="{{$dataMutasi['jenis']}}" name="jenis" type="text" class="form-control" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <label for="description">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" disabled>{{$dataMutasi['keterangan']}}</textarea>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="waktu">Bank Date</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="waktu" value="{{$dataMutasi['waktu']}}" name="waktu" type="text" class="form-control" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="created_at">Recorded Date</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="created_at" value="{{$dataMutasi['created_at']}}" name="created_at" type="text" class="form-control" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group button-demo">
                                <a href="{{base_url('record_mutasi')}}"><button type="button" class="btn btn-success waves-effect">KEMBALI</button></a>
                            </div>

                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection