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
                <form action="{{base_url('bank/'.$id.'/edit')}}" method="post">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="bank_name">Bank Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                <select id="bank_name" class="form-control show-tick" name="bank_name" required>
                                    <option value="" disabled selected>Pilih Nama Bank</option>
                                    <option value="BRI" @if ($masterBank->bank_name == "BRI") SELECTED @endif>BRI</option>
                                    <option value="BCA" @if ($masterBank->bank_name == "BCA") SELECTED @endif>BCA</option>
                                    <option value="BNI" @if ($masterBank->bank_name == "BNI") SELECTED @endif>BNI</option>
                                </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="account_id">Account ID</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{$masterBank->account_id}}" id="account_id" name="account_id" type="text" class="form-control" placeholder="Account ID" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="account_name">Account Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{$masterBank->account_name}}" id="account_name" name="account_name" type="text" class="form-control" placeholder="Account Name" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="username">Username</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{$masterBank->username}}" id="username" name="username" type="text" class="form-control" placeholder="Username" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="password">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{$masterBank->password}}" id="password" name="password" type="text" class="form-control" placeholder="Password" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label for="scrape_url">Scrape URL</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="scrape_url" value="{{$masterBank->scrape_url}}" name="scrape_url" type="text" class="form-control" placeholder="Scrape URL" required/>
                                </div>
                            </div>

                            <label for="status">Status</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select id="status" class="form-control show-tick" name="status" required>
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="1" @if ($masterBank->status == 1) SELECTED @endif>Active</option>
                                        <option value="0" @if ($masterBank->status == 0) SELECTED @endif>Deactive</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label for="auto_scrape">Auto Scrape</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select id="auto_scrape" class="form-control show-tick" name="auto_scrape" required>
                                                <option value="" disabled selected>Pilih Auto Scrape</option>
                                                <option value="1" @if ($masterBank->auto_scrape == 1) SELECTED @endif>Active</option>
                                                <option value="0" @if ($masterBank->auto_scrape == 0) SELECTED @endif>Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="scrape_interval">Scrape Interval (second)</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{$masterBank->scrape_interval}}" id="scrape_interval" name="scrape_interval" type="text" class="form-control" placeholder="Scrape Interval (second)" required/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <label for="mutasi_interval">Mutasi's Interval (days)</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{$masterBank->mutasi_interval}}" id="mutasi_interval" name="mutasi_interval" type="text" class="form-control" placeholder="Mutasi's Interval (days)" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group button-demo">
                                <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                                <a href="{{base_url('bank/'.$id.'/delete')}}"><button type="button" class="btn btn-danger waves-effect">DELETE</button></a> 
                                <a href="{{base_url('bank')}}"><button type="button" class="btn btn-success waves-effect">KEMBALI</button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection