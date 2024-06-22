@extends('notes.layout')

@section('content')
<style>
    body {
        background-color: #000000;
        color: #FFFFFF;
    }
    </style>
<div class="card mt-5">
    <h2 class="card-header">Agrega una nueva nota</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('notes.index') }}"><i class="fa fa-arrow-left"></i> Regresa</a>
        </div>

        <form action="{{ route('notes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="inputTitle" class="form-label"><strong>Nombre</strong></label>
                <input 
                    type="text" 
                    name="title" 
                    class="form-control @error('title') is-invalid @enderror" 
                    id="inputTitle" 
                    placeholder="Title">
                @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputContent" class="form-label"><strong>Calificación</strong></label>
                <textarea 
                    class="form-control @error('content') is-invalid @enderror" 
                    style="height:150px" 
                    name="content" 
                    id="inputContent" 
                    placeholder="Content"></textarea>
                @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Subir</button>
        </form>

    </div>
</div>
@endsection
