@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Create Asisten Lab </h3> </div> </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('aslab.store')}}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('hari_id') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Hari</label>
                <div class="col-md-9">
                    <select name="hari_id" id="hari_id" class="form-control select2" >
                        <option name="hari_id" id="hari_id" value="">---Pilih Hari---</option>
                        @foreach($hari as $day)
                        <option name="hari_id" id="hari_id" value="{{$day->id}}">{{$day->nama_hari}} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('hari_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('hari_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                <label for="activation" class="col-sm-2 control-label">Pilih Asisten Laboratorium</label>
                <div class="col-md-9">
                @foreach($users as $user)
                            <label>
                            <input class="someclass" type="checkbox" name="users_id[]" id="users_id[]" value="{{$data = $user->id}}"> {{$user->name}}
                            </label> 
                            </br>
                @endforeach 
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
                                        Tambahkan</button> </form>
                        <form action="{{route('aslab.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List Aslab</button></form>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection

@section('script')
<script>
   $('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 2) {
        $(this).prop('checked', false);
        alert("allowed only 2");
    }
});
</script>
@endsection
