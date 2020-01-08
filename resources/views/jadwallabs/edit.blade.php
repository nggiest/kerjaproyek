@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Edit Jadwal Penggunaan Lab </h3> </div> </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('lab.update', $jadwallab->id ) }}">
        {{ method_field('PUT') }}
             {{ csrf_field() }}

             <div class="form-group{{ $errors->has('jampel') ? ' has-error' : '' }}">

                <label for="makul_id" class="col-sm-2 control-label">ID Pelajaran</label>

                <div class="col-md-9">
                    <input id="makul_id" type="text" class="form-control" name="makul_id" value='{{$jadwallab->makul_id}}' required autofocus>

                    @if ($errors->has('makul_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('makul_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('jampel') ? ' has-error' : '' }}">

                <label for="jampel" class="col-sm-2 control-label">Jam Pelajaran</label>

                <div class="col-md-9">
                    <input id="jampel" type="text" class="form-control" name="jampel" value='{{$jadwallab->jampel}}' required autofocus>

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
                    <input id="makul" type="text" class="form-control" name="makul" value='{{$jadwallab->makul}}' required autofocus>

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
                    <input id="kelas" type="text" class="form-control" name="kelas" value='{{$jadwallab->kelas}}' required>

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
                    <input id="dosen" type="text" class="form-control" name="dosen" value='{{$jadwallab->dosen}}' required>

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
                                        Edit</button> </form>
                        <form action="{{route('lab.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List Jadwal Lab</button></form>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection
