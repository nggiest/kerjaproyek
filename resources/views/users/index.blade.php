@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Pengguna</h3>
    </div>
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
            @if(Auth::user()->role == 1 )
            <div class="col-sm-12"><form action="{{route('user.create')}}">
        <button type="submit" class="btn btn-warning btn-sm float-right"> <i class="fas fa-plus-circle"> </i>  Tambah Pengguna Baru </button> 
        </form></div>
        @endif
            <div class="col-sm-12 col-md-6"></div>
        </div>
        
        <br>
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" role="columnheader"  aria-sort="ascending">Nama</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Jabatan</th>
                        @if(Auth::user()->role == 1 )
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status Keanggotaan</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Action</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                    @php (
                        $no = 1
                        )
                    @foreach($user as $users)
                   
                      <tr role="row" class="odd">
                        <td>{{$no++}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->role == 1 ? 'Dosen' : 'Asisten Lab'}}</td>
                        @if(Auth::user()->role == 1 )
                        <td>{{$users->statuses}}</td>
                        <td style="text-align:center"> <form action="{{route('user.edit', $users->id)}}">  
                        <button class="btn btn-success" type="submit" value="Edit"> <i class="far fa-edit"> </i> Edit </button> </form> </td>
                        @endif
                    @endforeach
                      </tr>
                    </tbody>
                    <!-- <tfoot>
                        <tr><th rowspan="1" colspan="1">No</th>
                        <th rowspan="1" colspan="1">Nama</th>
                        <th rowspan="1" colspan="1">Jabatan</th>
                        @if(Auth::user()->role == 1 )
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Action</th></tr>
                        @endif
                    </tfoot> -->
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="example2_previous">
                            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                        </li>
                        <li class="paginate_button page-item next" id="example2_next">
                            <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('script')
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
