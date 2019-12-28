@extends('layouts.app')

@section('content')
<div class="card card-primary">
  <div class="card-header">
  <div class="card-title"> <h3 style="text-align:center"> Laporan Harian</h3> 
  </div>
  </div>
  <div class="card-body">
  <div class="col-sm-12"><form action="{{route('report.create')}}">
        <button type="submit" class="btn btn-success btn-sm float-right"> <i class="fas fa-plus-circle"> </i>  Tambah Laporan Baru </button> 
        </form></div>
  </div>
  {{csrf_field()}}
  @php (
    $no = 1
  )
  <form method="
  <div class="table-responsive" >
      <table id="" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="text-align:center" >No</th>
            <th style="text-align:center" >Tanggal </th>
            <th style="text-align:center" >Laporan Harian</th>
            @if(Auth::user()->role == 1 )
            <th style="text-align:center" >Petugas Pelapor</th>
            @endif
            <th colspan="3" style="text-align:center">Action</th>
                      
          </tr>
        </thead>
        <tbody>
          @php (
            $no = 1
                      
          )
          @foreach ($reportdaily as $daily)
          
            <tr>
                <td style="text-align:center">{{$no++}}</td>
                <td style="text-align:center">{{$daily->tanggal}}</td>
                <td style="text-align:center">{{$daily->report_note}}</td>
                @if(Auth::user()->role == 1 )
                <td style="text-align:center">{{$daily->nama}}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
      </table>
  </div>
  </div>
</div>
@include('sweet::alert')
@endsection

@section('script')
<script
              src="https://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous">
                  
</script>

<script type="text/javascript">
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
             });
</script>

<script type="text/javascript">

var no = 1 ;


          function view_report(reportId) {
            $.ajax({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
          
                  type: "GET",
                  url: '/daily/getDaily/'+reportId,
                  dataType:"json",
                  success: function(data){
                    console.log(data);
                    $("#activityx").empty();
                    $.each(data,function(key,value){
                      $("#activityx").append('<tr><td>'+value.id+'</td><td>'+value.activity+'</td><td>'+value.project_id+'</td><td>'+value.module+'</td><td>'+value.priority+'</td><td>'+value.status+'</td></tr>');
                    });
                  }
            });
            
          }

            

            </script>
<script>
      $(document).ready(function(){
        // For A Delete Record Popup
        $('.remove-record').click(function() {
          var id = $(this).attr('data-id');
          console.log(id);
          var url = $(this).attr('data-url');
          // var token = ;
          $(".remove-record-model").attr("action",url);
          $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="{{csrf_token()}}">');
          $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
          $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
        });

        $('.remove-data-from-delete-form').click(function() {
          $('body').find('.remove-record-model').find( "input" ).remove();
        });
        $('.modal').click(function() {
          // $('body').find('.remove-record-model').find( "input" ).remove();
        });
      });

</script>

@endsection