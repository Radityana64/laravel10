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
                        Set Center Point
                        <a href="{{ route('centre-point.create') }}" class=" btn btn-info btn-sm float-end">Tambah Data</a>
                    </div>
                    <div class="card-body">
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
                        <table class="table" id="dataCenterPoint">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Titik Koordinat</th>
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
    <!-- Pastikan jQuery dimuat terlebih dahulu -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Kemudian baru memuat file DataTables -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(function () {
            $('#dataCenterPoint').DataTable({
                processing:true,
                serverSide:true,
                responsive:true,
                lengthChange:true,
                autoWidth:false,
                ajax:'{{ route('centre-point.data') }}',
                columns:[
                    {
                        data:'DT_RowIndex',
                        orderable:false,
                        searchable:false
                    }, {
                        data:'koordinat'
                    },
                    {
                        data:'action'
                    }
                ]
            })
        })
    </script>
@endpush
