@extends('layouts.app')

@section('body')
<div class="container">
    <div class="d-flex align-items-center justify-content-between mt-5 mb-5">
        <h3 class="mb-0">Edit Laporan</h3>
        <a href="{{ route('info.index') }}" class="btn btn-secondary">Back</a>
    </div>
    
    <form action="{{ route('info.update', $info->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Shift</label>
                <select name="name" class="form-control" id="shiftSelect">
                    <option value="" disabled selected>Pilih jenis Shift</option>
                    <option value="Non Shift" {{ $info->name == "Non Shift" ? 'selected' : '' }}>Non Shift</option>
                    <option value="Shift 2" {{ $info->name == "Shift 2" ? 'selected' : '' }}>Shift 2</option>
                    <option value="Shift 3" {{ $info->name == "Shift 3" ? 'selected' : '' }}>Shift 3</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $info->author }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <label class="form-label">Date</label>
                <input type="text" name="date" class="form-control" placeholder="Date" value="{{ date('Y-m-d', strtotime($info->date)) }}">
            </div>
            <div class="col-md-6 mt-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="description" rows="{{ substr_count($info->description, "\n") + 1 }}">{{ $info->description }}</textarea>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col">
                <div class="d-grid">
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
