@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Create Jadwal Lab </h3> </div> </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('jadwallab.store')}}">
            {{ csrf_field() }}



            <div class="form-group{{ $errors->has('hari_id') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Hari</label>
                <div class="col-md-9">
                    <select name="hari_id" id="hari_id" class="form-control select2" >
                        <option name="hari_id" id="hari_id" value="">---Select Status---</option>
                        <option name="hari_id" id="hari_id" value="{{$data = 1 }}"> Senin </option>
                        <option name="hari_id" id="hari_id" value="{{$data = 2 }}"> Selasa </option>
                        <option name="hari_id" id="hari_id" value="{{$data = 3 }}"> Rabu </option>
                        <option name="hari_id" id="hari_id" value="{{$data = 4 }}"> Kamis</option>
                        <option name="hari_id" id="hari_id" value="{{$data = 5 }}"> Jumat </option>
                    </select>
                    @if ($errors->has('hari_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('hari_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('jampel') ? ' has-error' : '' }}">

                <label for="jampel" class="col-sm-2 control-label">Jam Pelajaran</label>

                <div class="col-md-9">
                    <input id="jampel" type="text" class="form-control" name="jampel" required autofocus>

                    @if ($errors->has('jampel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jampel') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('makul') ? ' has-error' : '' }}">

                <label for="makul" class="col-sm-2 control-label">Mata Kuliah</label>

                <div class="col-md-9">
                    <input id="makul" type="text" class="form-control" name="makul" required autofocus>

                    @if ($errors->has('makul'))
                        <span class="help-block">
                            <strong>{{ $errors->first('makul') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('kelas') ? ' has-error' : '' }}">
                <label for="kelas" class="col-sm-2 control-label">Kelas</label>

                <div class="col-md-9">
                    <input id="kelas" type="text" class="form-control" name="kelas" required>

                    @if ($errors->has('kelas'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kelas') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('dosen') ? ' has-error' : '' }}">
                <label for="dosen" class="col-sm-2 control-label">Dosen</label>

                <div class="col-md-9">
                    <input id="dosen" type="text" class="form-control" name="dosen" required>

                    @if ($errors->has('dosen'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dosen') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

           

           
            <div class="card-footer">
               
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary float-right">
                                        Create</button> </form>
                        <form action="{{route('jadwallab.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List User</button></form>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection
