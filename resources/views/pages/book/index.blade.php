@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection
@section('body')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mt-5 mb-5">
            <h3>List Laporan</h3>
            <a href="{{ route('book.create') }}" class="btn btn-primary mb-2">Tambah</a>
        </div>


        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('danger'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('danger') }}
            </div>
        @endif

        <div class="mb-5">
            <table id="myTable" class="table-bordered table-striped table-hover" style="width: 100%">
                <thead class="table-primary text-center">
                    <tr>
                        <th class="text-center" style="height: 40px">No</th>
                        <th class="text-center">Shift</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="table-light">
                            <td class="text-center" style="height: 20px">{{ $loop->iteration }}</td>
                            <td class="text-center" style="height: 20px">{{ $book->name }}</td>
                            <td class="text-center" style="height: 20px">{{ $book->author }}</td>
                            <td class="text-center" style="height: 20px">
                                {{ \Carbon\Carbon::parse($book->date)->format('d-m-Y') }}
                            </td>
                            <td class="text-center align-middle" style="height: 20px">
                                <!-- Tambahkan kelas align-middle di sini -->
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="{{ route('book.show', $book->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">Detail</button>
                                    </form>
                                    <form action="{{ route('book.edit', $book->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-warning"
                                            style="margin-right: 5px; margin-left: 5px;">Edit</button>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
