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
                    <td style="text-align:center">Jam 1</td>
                    @foreach($lab1 as $jab1 )
                      <td style="text-align:center">@if(Auth::User())   <a href="{{route('lab.edit',$jab1->id)}}"> {{$jab1->nama}}
                      @else
                      <td style="text-align:center"> <a href="{{route('lab.show',$jab1->id)}}"> {{$jab1->nama}}
                      {{$jab1->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>
                    <tr>
                    <td style="text-align:center">Jam 2</td>
                    @foreach($lab2 as $jab2 )
                      <td style="text-align:center">@if(Auth::User())   <a href="{{route('lab.edit',$jab2->id)}}"> {{$jab2->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab2->id)}}">
                      {{$jab2->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>

                    <tr>
                    <td style="text-align:center">Jam 3</td>
                    @foreach($lab3 as $jab3 )
                      <td style="text-align:center">@if(Auth::User()) <a href="{{route('lab.edit',$jab3->id)}}"> {{$jab3->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab3->id)}}">
                      {{$jab3->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>

                    <tr>
                    <td style="text-align:center">Jam 4</td>
                    @foreach($lab4 as $jab4 )
                      <td style="text-align:center">@if(Auth::User()) <a href="{{route('lab.edit',$jab4->id)}}"> {{$jab4->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab4->id)}}">
                      {{$jab4->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>

                    <tr>
                    <td style="text-align:center">Jam 5</td>
                    @foreach($lab5 as $jab5 )
                      <td style="text-align:center">@if(Auth::User()) <a href="{{route('lab.edit',$jab5->id)}}"> {{$jab5->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab5->id)}}">
                      {{$jab5->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>

                    <tr>
                    <td style="text-align:center">Jam 6</td>
                    @foreach($lab6 as $jab6 )
                      <td style="text-align:center">@if(Auth::User()) <a href="{{route('lab.edit',$jab6->id)}}"> {{$jab6->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab6->id)}}">
                      {{$jab6->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>

                    <tr>
                    <td style="text-align:center">Jam 7</td>
                    @foreach($lab7 as $jab7 )
                      <td style="text-align:center">@if(Auth::User()) <a href="{{route('lab.edit',$jab7->id)}}"> {{$jab7->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab7->id)}}">
                      {{$jab7->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>

                    <tr>
                    <td style="text-align:center">Jam 8</td>
                    @foreach($lab8 as $jab8 )
                      <td style="text-align:center">@if(Auth::User()) <a href="{{route('lab.edit',$jab8->id)}}"> {{$jab7->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab8->id)}}">
                      {{$jab8->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>

                    <tr>
                    <td style="text-align:center">Jam 9</td>
                    @foreach($lab9 as $jab9 )
                      <td style="text-align:center">@if(Auth::User()) <a href="{{route('lab.edit',$jab9->id)}}"> {{$jab9->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab9->id)}}">
                      {{$jab9->nama}}
                      @endif
                      </td>
                    @endforeach
                    </tr>

                    <tr>
                    <td style="text-align:center">Jam 10</td>
                    @foreach($lab10 as $jab10 )
                      <td style="text-align:center">@if(Auth::User()) <a href="{{route('lab.edit',$jab10->id)}}"> {{$jab10->nama}}
                      @else
                      <td style="text-align:center"><a href="{{route('lab.show',$jab10->id)}}">
                      {{$jab10->nama}}
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
