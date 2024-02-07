@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('body')
<div class="container">
    <div class="d-flex align-items-center justify-content-between mt-5 mb-5">
        <h3>List Informasi</h3>
        <a href="{{ route('info.create') }}" class="btn btn-primary">Tambah</a>     
    </div>
    
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    @if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif


     <table id="myTable" class="table-bordered table-striped table-hover" style="width: 100%">
            <thead class="table-primary text-center">
                <tr>
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Information</th>
                    <th class="text-center align-middle">Author</th>
                    <th class="text-center align-middle">Date</th>
                    <th class="text-center align-middle">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($infos as $info)
                <tr class="table-light">
                    <td class="align-middle text-center">{{ $loop->iteration }}</td>
                    <td class="align-middle text-center">{{ $info->name }}</td>
                    <td class="align-middle text-center">{{ $info->author }}</td>
                    <td class="align-middle text-center">{{ \Carbon\Carbon::parse($info->date)->format('d-m-Y') }}</td>
                    <td class="align-middle text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{ route('info.show', $info->id) }}" style="margin-right: 5px" method="GET">
                                <button type="submit" class="btn btn-secondary">Detail</button>
                            </form>
                            <form action="{{ route('info.edit', $info->id) }}" style="margin-right: 5px" method="GET">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>
                            <form action="{{ route('info.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
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
