@extends('layouts.app')

@section('body')
<div class="container mt-5">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="mb-0">Edit Laporan</h3>
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
    </div>
    
    <form action="{{ route('book.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mt-5">
                <label class="form-label">Shift</label>
                <select name="name" class="form-control" id="shiftSelect">
                    <option value="" disabled selected>Pilih jenis Shift</option>
                    <option value="Non Shift" {{ $book->name == "Non Shift" ? 'selected' : '' }}>Non Shift</option>
                    <option value="Shift 2" {{ $book->name == "Shift 2" ? 'selected' : '' }}>Shift 2</option>
                    <option value="Shift 3" {{ $book->name == "Shift 3" ? 'selected' : '' }}>Shift 3</option>
                </select>
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $book->author }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <label class="form-label">Date</label>
                <input type="text" name="date" class="form-control" placeholder="Date" value="{{ date('Y-m-d', strtotime($book->date)) }}">
            </div>
            <div class="col-md-6 mt-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="description" rows="{{ substr_count($book->description, "\n") + 1 }}">{{ $book->description }}</textarea>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="d-grid">
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
