@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Detail Jadwal Penggunaan Lab </h3> </div> </div>
    <div class="card-body">
       

             <div class="form-group{{ $errors->has('hari') ? ' has-error' : '' }}">

                <label for="hari" class="col-sm-2 control-label">Hari</label>

                <div class="col-md-9">
                <select name="hari_id" id="hari_id" class="form-control select2" disabled>
                        <option name="hari_id" id="hari_id" value="">---Pilih Hari---</option>
                        @foreach($hari as $hariku )
                         <option name="hari_id" id="hari_id" value="{{$hariku->id}}" {{ $jadwallab->hari_id  == $hariku->id ? 'selected' : '' }}  > {{$hariku->nama_hari}} </option>
                     @endforeach
                    </select>
                    @if ($errors->has('hari'))
                        <span class="help-block">
                            <strong>{{ $errors->first('hari') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('jampel') ? ' has-error' : '' }}">

                <label for="jampel" class="col-sm-2 control-label">Jam Pelajaran</label>

                <div class="col-md-9">
                    <input id="jampel" type="text" class="form-control" name="jampel" value='{{$jadwallab->jampel}}' disabled>

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
                <select name="makul_id" id="makul_id" class="form-control select2" disabled>
                        <option name="makul_id" id="makul_id" value="">---Select Makul---</option>
                        @foreach($makul as $makulku )
                         <option name="makul_id" id="makul_id" value="{{$makulku->id}}" {{ $jadwallab->makul_id  == $makulku->id ? 'selected' : '' }}  > {{$makulku->nama_makul}} </option>
                     @endforeach
                    </select>
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
                <select name="kelas_id" id="kelas_id" class="form-control select2" disabled>
                        <option name="kelas_id" id="kelas_id" value="">---Select Kelas---</option>
                        @foreach($kelas as $kelasku )
                         <option name="kelas_id" id="kelas_id" value="{{$kelasku->id}}" {{ $jadwallab->kelas_id  == $kelasku->id ? 'selected' : '' }}  > {{$kelasku->nama_kelas}} </option>
                     @endforeach
                    </select>
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
                <select name="dosen_id" id="dosen_id" class="form-control select2" disabled>
                        <option name="dosen_id" id="dosen_id" value="">---Select Dosen---</option>
                        @foreach($dosen as $dosenku )
                         <option name="dosen_id" id="dosen_id" value="{{$dosenku->id}}" {{ $jadwallab->dosen_id  == $dosenku->id ? 'selected' : '' }}  > {{$dosenku->nama_dosen}} </option>
                     @endforeach
                    </select>
                    @if ($errors->has('dosen'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dosen') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                    <div class="form-group ">
                        <form action="{{route('lab.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List Jadwal Lab</button></form>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection
