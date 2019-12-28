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
                <form action="{{base_url('profile/change_password')}}" method="post">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="password_old">Password Sebelumnya</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="password_old" name="password_old" type="password" class="form-control" placeholder="Password Lama" required/>
                                </div>
                            </div>
                            
                            <label for="password_new">Password Baru</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="password_new" name="password_new" type="password" class="form-control" placeholder="Password Baru" required/>
                                </div>
                            </div>
                            
                            <label for="password_new_verif">Ulangi Password Baru</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="password_new_verif" name="password_new_verif" type="password" class="form-control" placeholder="Ulangi Password Baru" required/>
                                </div>
                            </div>
                            
                            <div class="form-group button-demo">
                                <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                                <a href="{{base_url('dashboard')}}"><button type="button" class="btn btn-success waves-effect">KEMBALI</button></a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection