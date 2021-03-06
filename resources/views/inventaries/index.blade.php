@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Inventaris</h3>
    </div>
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row"><div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
            <div class="col-sm-12"><form action="{{route('inventaris.create')}}">
            <button type="submit" class="btn btn-success btn-sm float-right"> <i class="fas fa-plus-circle"> </i>  Tambah Data Baru </button> 
            </form></div>
             </div>
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                        <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                        <th style="text-align:center" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Jenis Barang</th>
                        <th style="text-align:center" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Jumlah</th>
                        <th style="text-align:center" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="3" aria-label="CSS grade: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php (
                        $no = 1
                        )
                    @foreach($inventaris as $inventaries)
                   
                      <tr role="row" class="odd">
                        <td>{{$no++}}</td>
                        <td>{{$inventaries->jenis_barang}}</td>
                        <td>{{$inventaries->jumlah}}</td>
                        <td style="text-align:center"> <form action="{{route('inventaris.edit', $inventaries->id)}}">  
                        <button class="btn btn-success" type="submit" value="Edit"> Edit </button> </form></td>
                        <td style="text-align:center"><form action="{{route('inventaris.show', $inventaries->id)}}">  
                        <button class="btn btn-success" type="submit" value="Detail"> Detail </button> </form></td>
                        <td><form action="{{route('inventaris.destroy', $inventaries->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-success" type="submit" value="Delete"> Delete </button>
                        </form></td>
                    @endforeach
                      </tr>
                    </tbody>

                    
                    
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
