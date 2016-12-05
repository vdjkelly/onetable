@extends('layouts.app')

@section('titulo', 'Editar sucursal')

    <!-- Main -->
    @section('content')
        <div class="panel panel-default">
            <div class="panel-heading">Administración</div>
            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1>Editar Sucursal</h1>
                {!! Form::open(['route' => ['sucursales.update', $sucursal], 'method'=>'PATCH' , 'files' =>true]) !!}

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre o identificador') !!}
                    {!! Form::text('nombre', $sucursal->nombre , ['class'=> 'form-control' , 'required'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('coordenadaLatitud', 'Ubicacion') !!}
                    {!! Form::text('coordenadaLatitud', $sucursal->coordenadaLatitud , ['class'=> 'form-control' , 'required'])!!}
                    {!! Form::label('coordenadaLongitud', ' ') !!}
                    {!! Form::text('coordenadaLongitud', $sucursal->coordenadaLongitud , ['class'=> 'form-control' , 'required'])!!}
                    <div id="map"></div>
                    <input id="buscarUbicacion" class="controls" type="text" placeholder="Buscar">
                </div>

                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción') !!}
                    {!! Form::text('descripcion', $sucursal->descripcion , ['class'=> 'form-control' , 'required'])!!}
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/fotosucursales/{{ $sucursal->foto }}" class="img-responsive">
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('foto', 'Fotografia') !!}
                            {!! Form::file('foto')!!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::submit('Guardar cambios',['class'=> 'btn btn-primary'])!!}
                    <a href = "{{route('sucursales.index')}}" class='btn btn-default'>Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $(function(){
                if ( $("#map").length > 0 ) {
                    iniciarMapa();
                }
            });
        </script>
    @endsection