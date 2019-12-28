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
                <form action="{{base_url('users/add')}}" method="post">
                    <div class="row clearfix">
                        <div class="col-sm-12">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="fullname">Nama Lengkap</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="fullname" value="" name="full_name" type="text" class="form-control" placeholder="Nama Lengkap" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="username">Username</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="username" value="" name="username" type="text" class="form-control" placeholder="Username" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <label for="gender">Jenis Kelamin</label>
                            <div class="form-group">
                                <div class="form-line">
                                <select id="gender" class="form-control show-tick" name="gender" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6">
                                    
                                </div>
                            </div>


                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="password">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="password" value="" name="password" type="password" class="form-control" placeholder="Password" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="re_password">Re-type Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="re_password" value="" name="password2" type="password" class="form-control" placeholder="Re-type Password" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="jabatan">Jabatan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="jabatan" value="" name="jabatan" type="text" class="form-control" placeholder="Jabatan" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="role">Role</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <select id="role" class="form-control show-tick" name="role" required>
                                            <option value="" disabled selected>Pilih Role</option>
                                            <option value="2">Viewer</option>
                                            <option value="1">Administrator</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="email">E-mail</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="email" value="" name="email" type="email" class="form-control" placeholder="Email" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone">No Telp</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="phone" value="" name="phone" type="text" class="form-control" placeholder="Phone Number" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <label for="status">Status</label>
                            <div class="form-group">
                                <div class="form-line">
                                <select id="status" class="form-control show-tick" name="status" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="1">Aktive</option>
                                    <option value="0">Deaktive</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group button-demo">
                                <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                <a href="{{base_url('users')}}"><button type="button" class="btn btn-success waves-effect">KEMBALI</button></a>
                            </div>

                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection