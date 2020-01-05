@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Edit Data Asisten Lab </h3> </div> </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('aslab.update', $jadwalaslab->id ) }}">
        {{ method_field('PUT') }}
             {{ csrf_field() }}

             <div class="form-group{{ $errors->has('users_id') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Nama</label>
                <div class="col-md-9">
                    <select name="users_id" id="users_id" class="form-control select2" >
                        <option name="users_id" id="users_id" value="">---Select Nama---</option>
                        @foreach($user as $userku )
                         <option name="users_id" id="users_id" value="{{$userku->id}}" {{ $jadwalaslab->users_id  == $userku->id ? 'selected' : '' }} > {{$userku->name}} </option>
                     @endforeach
                    </select>
                    @if ($errors->has('users_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('users_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

             <div class="form-group{{ $errors->has('hari_id') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Hari</label>
                <div class="col-md-9">
                    <select name="hari_id" id="hari_id" class="form-control select2" disabled >
                        <option name="hari_id" id="hari_id" value="">---Select Hari---</option>
                        @foreach($hari as $hariku )
                         <option name="hari_id" id="hari_id" value="{{$hariku->id}}" {{ $jadwalaslab->hari_id  == $hariku->id ? 'selected' : '' }} > {{$hariku->nama_hari}} </option>
                     @endforeach
                    </select>
                    @if ($errors->has('hari_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('hari_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('aslabjab') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Jabatan</label>
                <div class="col-md-9">
                    <select name="aslabjab" id="aslabjab" class="form-control select2" disabled>
                        <option name="aslabjab" id="aslabjab" value="">---Select Jabatan---</option>
                        @foreach($aslabjab as $aslabjabku )
                         <option name="aslabjab" id="aslabjab" value="{{$aslabjabku->id}}" {{ $jadwalaslab->aslabjab  == $aslabjabku->id ? 'selected' : '' }}  > {{$aslabjabku->jabatan}} </option>
                     @endforeach
                    </select>
                    @if ($errors->has('aslabjab'))
                        <span class="help-block">
                            <strong>{{ $errors->first('aslabjab') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

           

           
            <div class="card-footer">
               
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary float-right">
                                        Create</button> </form>
                        <form action="{{route('aslab.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List Jadwal Asisten Lab</button></form>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection
