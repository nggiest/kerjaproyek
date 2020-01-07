@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Jadwal Penggunaan Lab</h3>
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
                        <th class="sorting" tabindex="0" aria-controls="example2" style="text-align:center" >Jam Pelajaran</th>
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
                    <tr>
                    <td style="text-align:center">Jam 1</td>
                    @foreach($jadwallab1 as $jab1 )
                      <td style="text-align:center">@if(Auth::User())   <a href="{{route('lab.edit',$jab1->id)}}"> {{$jab1->nama}}
                      @else
                      {{$jab1->nama}}
                      @endif
                      </td>
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
