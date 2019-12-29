@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Edit Data Asisten Lab </h3> </div> </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('jadwalaslab.update', $jadwalaslab->id ) }}">
        {{ method_field('PUT') }}
             {{ csrf_field() }}

             <div class="form-group{{ $errors->has('hari_id') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Activation Status</label>
                <div class="col-md-9">
                    <select name="hari_id" id="hari_id" class="form-control select2" >
                        <option name="hari_id" id="hari_id" value="">---Select Status---</option>
                        <option name="hari_id" id="hari_id" value="{{$data = 1 }}" {{ $user->hari_id  == $data ? 'selected' : '' }}> Senin </option>
                        <option name="hari_id" id="hari_id" value="{{$data = 2 }}" {{ $user->hari_id  == $data ? 'selected' : '' }}> Selasa </option>
                        <option name="hari_id" id="hari_id" value="{{$data = 3 }}" {{ $user->hari_id  == $data ? 'selected' : '' }}> Rabu </option>
                        <option name="hari_id" id="hari_id" value="{{$data = 4 }}" {{ $user->hari_id  == $data ? 'selected' : '' }}> Kamis </option>
                        <option name="hari_id" id="hari_id" value="{{$data = 5 }}" {{ $user->hari_id  == $data ? 'selected' : '' }}> Jumat </option>
                    </select>
                    @if ($errors->has('hari_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('hari_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Activation Status</label>
                <div class="col-md-9">
                    <select name="status_id" id="status_id" class="form-control select2" >
                        <option name="status_id" id="status_id" value="">---Select Status---</option>
                        <option name="status_id" id="status_id" value="{{$data = 1 }}" {{ $user->status_id  == $data ? 'selected' : '' }}> Active User </option>
                        <option name="status_id" id="status_id" value="{{$data = 0 }}" {{ $user->status_id  == $data ? 'selected' : '' }}> Non Active User </option>
                    </select>
                    @if ($errors->has('status_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('status_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


           
            <div class="card-footer">
               
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary float-right">
                                        Create</button> </form>
                        <form action="{{route('jadwalaslab.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List Jadwal Asisten Lab</button></form>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection
