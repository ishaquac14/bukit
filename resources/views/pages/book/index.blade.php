@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection
@section('body')
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h2>List Laporan</h2>
        <a href="{{ route('book.create') }}" class="btn btn-primary mb-2">Add Laporan</a>     
    </div>
        <div class="col-md-3 offset-md-9">
        <form action="/book" class="d-flex ml-auto" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
            <thead class="table-primary text-center">
                <tr>
                    <th width="2%">No</th>
                    <th>Shift</th>
                    <th width="30%">Author</th>
                    <th>Date</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($books->count() > 0)
                @foreach ($books as $book)
                <tr class="table-light"> <!-- Tambahkan kelas ini untuk tampilan yang lebih baik -->
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $book->name }}</td>
                    <td class="align-middle">{{ $book->author }}</td>
                    <td class="align-middle text-center">{{ \Carbon\Carbon::parse($book->date)->format('d-m-Y') }}</td>
                    <td class="align-middle text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="5">Laporan tidak ditemukan</td>
                </tr>
                @endif
            </tbody>
        </table>
        @include('layouts.pagination-book', ['books' => $books])
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection
