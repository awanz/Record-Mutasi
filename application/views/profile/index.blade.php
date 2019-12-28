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
                <form action="{{base_url('profile')}}" method="post">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="username">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="username" value="{{$dataProfile['username']}}" type="text" class="form-control" placeholder="Username" disabled required/>
                                </div>
                            </div>
                            <label for="fullname">Fullname</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="fullname" value="{{$dataProfile['full_name']}}" name="full_name" type="text" class="form-control" placeholder="Fullname" required />
                                </div>
                            </div>
                            <label for="gender">Jenis Kelamin</label>
                            <div class="form-group">
                                <div class="form-line">
                                <select id="gender" class="form-control show-tick" name="gender" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="MALE" @if ($dataProfile['gender'] == 'MALE') SELECTED @endif>MALE</option>
                                    <option value="FEMALE" @if ($dataProfile['gender'] == 'FEMALE') SELECTED @endif>FEMALE</option>
                                </select>
                                </div>
                            </div>
                            <label for="jabatan">Jabatan</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="jabatan" value="{{$dataProfile['jabatan']}}" name="jabatan" type="text" class="form-control" placeholder="Jabatan" required />
                                </div>
                            </div>
                            <label for="email">E-mail</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="email" value="{{$dataProfile['email']}}" name="email" type="email" class="form-control" placeholder="Email" required />
                                </div>
                            </div>
                            <label for="phone">No Telp</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="phone" value="{{$dataProfile['phone']}}" name="phone" type="text" class="form-control" placeholder="Phone Number" required />
                                </div>
                            </div>
                            <div class="form-group button-demo">
                                <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                                <a href="{{base_url('dashboard')}}"><button type="button" class="btn btn-success waves-effect">KEMBALI</button></a>
                            </div>

                            
                        </div>
                        <div class="col-sm-6">
                            <br><br>
                            <div style="text-align:center;">
                                @php $photo = base_url('gambar/profile/'.$dataProfile['profile_picture']); @endphp
                                <img style="border-radius: 50%; width:35%; max-width:300px;" src="@if (@getimagesize($photo)) {{base_url('gambar/profile/'.$dataProfile['profile_picture'])}} @else {{base_url('gambar/profile/no_photo.png')}} @endif" alt="{{$dataProfile['full_name']}}" />
                                <br><br>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePhoto">Change Photo</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="changePhoto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="changePhoto">Pilih Gambar</h4>
            </div>
            <form action="{{base_url('profile/change_photo')}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="file" name="userfile" id="userfile" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection