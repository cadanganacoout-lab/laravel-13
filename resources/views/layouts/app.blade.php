<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Perpustakaan Mini')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/3.1.2/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/4.1.2/css/buttons.dataTables.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('book.index') }}">📚 Perpustakaan Mini</a>
        </div>
    </nav>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/3.1.2/js/dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/4.1.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/4.1.2/js/buttons.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.3.11/build/pdfmake.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.3.11/build/vfs_fonts.js"></script> --}}
@stack('coba-script')
</html>
