@extends('layouts.app')
@section('content')
<div class="card card-primary">
<div class="card-header">
<div class="card-title"> <h3 style="text-align:center"> Edit Inventaris </h3> </div> </div>
    <div class="card-body">
        {{ method_field('PUT') }}
             {{ csrf_field() }}
             <input type="hidden" name="update_by" id="update_by" value="{{Auth::user()->id}}">
             <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                        <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                        <th style="text-align:center" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Jenis Barang</th>
                        <th style="text-align:center" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Jumlah</th>                      
                        </tr>
                    </thead>
                    <tbody>
                    @php (
                        $no = 1
                        )
                    
                      <tr role="row" class="odd">
                        <td>{{$no++}}</td>
                        <td>{{$inventaris->jenis_barang}}</td>
                        <td>{{$inventaris->jumlah}}</td>
                        
                      </tr>
                    </tbody>
                </table>
                
                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">

                <label for="detail" class="col-sm-2 control-label"><h2>Detail</h2></label>

                <div class="col-md-12">
                    <input id="detail" type="textarea" class="form-control" value="{{$inventaris->detail}}" name="detail" required autofocus disabled>
                    @if ($errors->has('detail'))
                        <span class="help-block">
                            <strong>{{ $errors->first('detail') }}</strong>
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
                        
                        <form action="{{route('inventaris.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To List Inventaris</button></form>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection
