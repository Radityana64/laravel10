@extends('layouts.dashboard-volt') 

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Daftar Tempat
                        <a href="{{ route('spot.create') }}" class=" btn btn-info btn-sm float-end">Tambah Tempat</a>
                    </div>
                    <div class="card-body" style="overflow-x: auto;">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table" id="dataSpot" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dinas</th>
                                    <th>Koordinat</th>
                                    <th>Alamat</th>
                                    <th>Tipe</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <form action="" method="post" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Hapus" style="display:none">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(function(){
            $('#dataSpot').DataTable({
                processing:true,
                serverSide:true,
                responsive:true,
                lengthChange:true,
                autoWidth:false,
                
                ajax:'{{ route('spot.data') }}',
                columns:[
                    {
                        data:'DT_RowIndex',
                        orderable:false,
                        searchable:false
                    },{
                        data:'nama_dinas'
                    },{
                        data:'koordinat'
                    },{
                        data:'alamat'
                    },{
                        data:'tipe'
                    },
                    {
                        data:'action'
                    }
                ]
            })
        })
    </script>
@endpush