@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Daftar Kategori</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped mb-0" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kategori</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@push('coba-script')
    <script>
        $('#myTable').DataTable({
            ajax: {
                url: "{{ route('category.datatable') }}",
                dataSrc: 'data'
            },
            columns: [{
                    "data": "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'name'
                },
                {
                    data: 'action'
                } // Bisa membaca nested JSON object
            ]
        });
    </script>
@endpush
