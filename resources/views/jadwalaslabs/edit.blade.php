@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Edit Jadwal Asisten Lab </h3> </div> </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('aslab.update', $jadwalaslab->id ) }}">
        {{ method_field('PUT') }}
             {{ csrf_field() }}
             <!-- <input type="hidden" name="update_by" id="update_by" value="{{Auth::user()->id}}"> -->
            
             <div class="form-group{{ $errors->has('users_id') ? ' has-error' : '' }}">
                 <label for="name" class="col-sm-2 control-label"></label>
                 <div class="col-sm-9">
                     <select name="users_id" id="users_id" class="form-control select2">
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
            
             <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                 <label for="name" class="col-sm-2 control-label"></label>
                 <div class="col-sm-9">
                     <select name="hari_id" id="hari_id" class="form-control select2" disabled>
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

<<<<<<< HEAD
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

           
=======
             <div class="form-group{{ $errors->has('aslabjab') ? ' has-error' : '' }}">
                 <label for="name" class="col-sm-2 control-label"></label>
                 <div class="col-sm-9">
                     <select name="aslabjab" id="aslabjab" class="form-control select2" disabled>
                     @foreach($aslabjab as $jab )
                         <option name="aslabjab" id="aslabjab" value="{{$jab->id}}" {{ $jadwalaslab->aslabjab  == $jab->id ? 'selected' : '' }} > {{$jab->jabatan}} </option>
                     @endforeach
                         </select>
                         @if ($errors->has('aslabjab'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('aslabjab') }}</strong>
                             </span>
                         @endif
                 </div>
             </div>

            
>>>>>>> 5bab5c2b071842d7616c5e2f7255df5f4e3ae7ed

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
<<<<<<< HEAD
                                        Create</button> </form>
                        <form action="{{route('aslab.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List Jadwal Asisten Lab</button></form>
=======
                                        Edit</button> </form>
                        <form action="{{route('aslab.index')}}"><button type="submit" class="btn btn-primary pull-left">Kembali ke Jadwal</button></form>
>>>>>>> 5bab5c2b071842d7616c5e2f7255df5f4e3ae7ed
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection