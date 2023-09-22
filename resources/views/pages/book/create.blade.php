@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Buat Laporan</h1>
    <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <hr>
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <select name="name" class="form-control" id="shiftSelect">
                  <option value="" disabled selected>Pilih jenis Shift</option>
                  <option value="Non Shift">Non Shift</option>
                  <option value="Shift 2">Shift 2</option>
                  <option value="Shift 3">Shift 3</option>
                </select>
            </div>                            
            <div class="col">
            <input type="text" name="author" class="form-control" placeholder="Author">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="date" name="date" class="form-control">
            </div>                      
            <div class="col">
            <textarea class="form-control" name="description" placeholder="description"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection