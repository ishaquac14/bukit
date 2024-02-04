@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection
@section('body')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mt-5 mb-5">
            <h2>List Laporan</h2>
            <a href="{{ route('book.create') }}" class="btn btn-primary mb-2">Add Laporan</a>
        </div>
        
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        
            <table id="myTable" class="table-bordered table-striped table-hover" style="width: 100%">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="height: 40px">No</th>
                        <th>Shift</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $pageNumber = $books->currentPage(); // Mendapatkan nomor halaman saat ini
                        $itemsPerPage = $books->perPage(); // Mendapatkan jumlah item per halaman
                        $baseNumber = ($pageNumber - 1) * $itemsPerPage + 1; // Menghitung nomor awal untuk halaman saat ini
                    @endphp
                    {{-- @if ($books->count() > 0) --}}
                        @foreach ($books as $book)
                            <tr class="table-light"> <!-- Tambahkan kelas ini untuk tampilan yang lebih baik -->
                                <td>{{ $baseNumber + $loop->index }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($book->date)->format('d-m-Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form action="{{ route('book.show', $book->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">Detail</button>
                                        </form>
                                        <form action="{{ route('book.edit', $book->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-warning" style="margin-right: 5px; margin-left: 5px;">Edit</button>
                                        </form>
                                        <form action="{{ route('book.destroy', $book->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    {{-- @else
                        <tr>
                            <td class="text-center" colspan="5">Laporan tidak ditemukan</td>
                        </tr>
                    @endif --}}
                </tbody>
            </table>
            {{-- @include('layouts.pagination-book', ['books' => $books]) --}}
    </div>
@endsection

{{-- <script src="{{ asset('js/sidebar.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

