@extends('plantilla.plantilla')

@section('titulo','Confirme la eliminación del registro')
    
@section('contenido')
    <div class="container py-5">
        <h1>Desea eliminar el registro de {{ $Agenda->nombres }} {{ $Agenda->apellidos }}?</h1>
        <form method="POST" action="{{ route('agenda.destroy', $Agenda->id) }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="redondo btn btn-danger">
                <i class="fas fa-trash-alt">Eliminar</i>
            </button>
            <a class="redondo btn btn-secondary" href="{{ route('cancelar') }}">
                <i class="fas fa-ban">Cancelar</i>
            </a>
        </form>
    </div>
    @include('plantilla.footer', ['container'=>'container'])
@endsection
