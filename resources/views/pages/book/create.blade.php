@extends('layouts.app')

@section('body')
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Buat Laporan</h1>
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <hr>
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Shift</label>
                <select name="name" class="form-control" id="shiftSelect">
                    <option value="" disabled selected>--Pilih Shift--</option>
                    <option value="Non Shift">Non Shift</option>
                    <option value="Shift 2">Shift 2</option>
                    <option value="Shift 3">Shift 3</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="description" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="d-grid">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
