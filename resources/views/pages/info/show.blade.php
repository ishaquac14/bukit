@extends('layouts.app')

@section('body')
<div class="container">
    <div class="d-flex align-items-center justify-content-between mt-5 mb-5">
        <h3 class="mb-0">Detail Informasi</h3>
        <a href="{{ route('info.index') }}" class="btn btn-secondary">Back</a>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Shift</label>
            <input type="text" name="name" class="form-control" placeholder="Shift" value="{{ $info->name }}" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $info->author }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label class="form-label">Date</label>
            <input type="text" name="date" class="form-control" placeholder="Date" value="{{ date('Y-m-d', strtotime($info->date)) }}" readonly>
        </div>
        <div class="col-md-6 mt-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="description" rows="{{ substr_count($info->description, "\n") + 1 }}" readonly>{{ $info->description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $info->created_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
        <div class="col-md-6 mt-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $info->updated_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
    </div>
</div>
@endsection
