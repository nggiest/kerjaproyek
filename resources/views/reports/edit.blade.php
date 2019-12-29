@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('daily.update', $reportdaily->id)}}">
    {{ method_field('PUT') }}
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
            <div class="card card-primary">
                <div class="card-header"><h3 style="text-align:center">Ubah Laporan Harian </h3></div>
            </div>
            <div id="card-activities" class="">
            <div class="card card-primary cloningan" id="myactivities">
                  <h3 style="text-align:center"> Laporan
                  </h3>
                  <div class="card-body" id="activitycard">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label for="" class="col-md-2">Rincian Laporan</label>
                          <div class="col-md-9">
                        <input type="text" class="form-control ini" id="report_note" name="report_note" value="{{$reportdaily->report_note}}">
                          </div>
                      </div>
                    </div>
                  </div>   
              </div>
              </div>
            </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Ubah</button>  </form> 
              <form action="{{route('daily.index')}}"><button type="submit" class="btn btn-primary pull-left">Kembali ke Daftar Laporan </button></form>
            </div> 
          </div>
          
  </div>


@endsection

@section('script')

@endsection
            
                       