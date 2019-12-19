@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Create User </h3> </div> </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('user.store')}}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <label for="name" class="col-sm-2 control-label">Name</label>

                <div class="col-md-9">
                    <input id="name" type="text" class="form-control" name="name" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">

                <label for="nim" class="col-sm-2 control-label">NIM</label>

                <div class="col-md-9">
                    <input id="nim" type="text" class="form-control" name="nim" required autofocus>

                    @if ($errors->has('nim'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nim') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-sm-2 control-label">E-Mail Address</label>

                <div class="col-md-9">
                    <input id="email" type="email" class="form-control" name="email" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-sm-2 control-label">Password</label>

                <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password"  required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>

                <div class="col-md-9">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
                        
            <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Activation Status</label>
                <div class="col-md-9">
                    <select name="status_id" id="status_id" class="form-control select2" >
                        <option name="status_id" id="status_id" value="">---Select Status---</option>
                        <option name="status_id" id="status_id" value="{{$data = 1 }}"> Active User </option>
                        <option name="status_id" id="status_id" value="{{$data = 2 }}"> Non Active User </option>
                    </select>
                    @if ($errors->has('status_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('status_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                <label for="name" class="col-sm-2 control-label">Role</label>
                <div class="col-md-9">
                    <select name="role" id="role" class="form-control select2" >
                    <option name="role" id="role" value="">---Select Role---</option>
                    <option name="role" id="role" value="{{$data = '1'}}"> Dosen </option>-
                    <option name="role" id="role" value="{{$data = '2'}}"> Asisten Lab </option>
                    </select>
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!-- <div class="form-group">
                    <label for="photo" class="col-sm-2 control-label">Foto Diri</label>
                    <div class="input-group">
                     <div class="col-md-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                     </div>
                    </div>
                  </div> -->
            <div class="card-footer">
               
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary float-right">
                                        Create</button> </form>
                        <form action="{{route('user.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List User</button></form>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection
