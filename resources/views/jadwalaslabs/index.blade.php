@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Jadwal Asisten Lab</h3>
    </div>
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row"><div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example2" style="text-align:center" >Sesi</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" style="text-align:center" >Senin</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" style="text-align:center" >Selasa</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" style="text-align:center" >Rabu</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" style="text-align:center" >Kamis</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"style="text-align:center" >Jumat</th>
                        
                        </tr>
                    </thead>
                    @php (
                        $no = 1
                    )
                    <tbody>
                    <tr>
                    <td style="text-align:center">Sesi 1</td>
                    @foreach($jadwalaslab1 as $jab1 )
                      <td style="text-align:center">@if(Auth::User())
                      <a href="{{route('aslab.edit',$jab1->id)}}">{{$jab1->nama}}</a>
                      @else
                      {{$jab1->nama}}
                      @endif
                      </td>
                    @endforeach
                    <tr>
                    <td style="text-align:center">Sesi 2</td>
                    @foreach($jadwalaslab2 as $jab2 )
                      <td style="text-align:center">@if(Auth::User())
                      <a href="{{route('aslab.edit',$jab2->id)}}">{{$jab2->nama}}</a>
                      @else
                      {{$jab2->nama}} @endif</td>
                    @endforeach
                      </tr>
                    
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
