@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Create User </h3> </div> </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('user.store')}}">
            {{ csrf_field() }}
            <input type="hidden" name="update_by" id="update_by" value="{{Auth:user()->id}}">
            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">

                <label for="id" class="col-sm-2 control-label">ID</label>

                <div class="col-md-9">
                    <input id="id" type="text" class="form-control" name="id" required autofocus>

                    @if ($errors->has('id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('jenis_barang') ? ' has-error' : '' }}">

                <label for="jenis_barang" class="col-sm-2 control-label">Jenis Barang</label>

                <div class="col-md-9">
                    <input id="jenis_barang" type="text" class="form-control" name="jenis_barang" required autofocus>

                    @if ($errors->has('jenis_barang'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jenis_barang') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">

                <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>

                <div class="col-md-9">
                    <input id="jumlah" type="text" class="form-control" name="jumlah" required autofocus>

                    @if ($errors->has('jumlah'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jumlah') }}</strong>
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