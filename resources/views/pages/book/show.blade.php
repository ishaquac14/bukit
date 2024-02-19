@extends('layouts.app')

@section('body')
<div class="container mt-5">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="mb-0">Detail Laporan</h3>
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <label class="form-label">Shift</label>
            <input type="text" name="name" class="form-control" placeholder="Shift" value="{{ $book->name }}" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $book->author }}" readonly>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label">Date</label>
            <input type="text" name="date" class="form-control" placeholder="Date" value="{{ date('Y-m-d', strtotime($book->date)) }}" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="description" rows="{{ substr_count($book->description, "\n") + 1 }}" readonly>{{ $book->description }}</textarea>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $book->created_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $book->updated_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
    </div>
</div>
@endsection
