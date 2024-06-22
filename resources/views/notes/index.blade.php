@extends('notes.layout')

@section('content')

<style>
    body {
        background-color: #000000;
        color: #FFFFFF;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #ffffff;
    }
    .btn-info {
        background-color: gray;
        border-color: #17a2b8;
        color: #ffffff;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #ffffff;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #ffffff;
    }
    .card {
        background-color: #333333;
        color: #ffffff;
    }
    .table {
        color: #ffffff;
    }
    .table thead {
        background-color: #555555;
    }
    .table tbody tr {
        background-color: #444444;
    }
    .table tbody tr:hover {
        background-color: #555555;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }
</style>

<div class="card mt-5">
    <h2 class="card-header">Aplicación de Emmanuel mi primer CRUD con laravel</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('notes.create') }}"><i class="fa fa-plus"></i> Crear una nota</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Nombre</th>
                    <th>Calificación</th>
                    <th width="250px">Acción</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($notes as $note)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->content }}</td>
                        <td>
                            <form action="{{ route('notes.destroy',$note->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('notes.show',$note->id) }}"><i class="fa-solid fa-list"></i> Mostrar</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('notes.edit',$note->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay datos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {!! $notes->links() !!}

    </div>
</div>  
@endsection
