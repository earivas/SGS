@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>
            Nueva Modelo
        </h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{!! Form::open(array('url'=>'catalogo/modelo','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
{{ Form::token()}}
  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>



    <!--Primera Fila-->
    <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <!--	<div class="form-group"> -->
            <!--	<label for="cedula">Cédula</label> -->
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user">
                    </i>
                </span>
                <input class="form-control" name="cedula" placeholder="Cédula ..." required="" type="text" value="{{old('cedula')}}">
                </input>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user">
                    </i>
                </span>
                <input class="form-control" name="nombre" placeholder="Nombres ..." required="" type="text" value="{{old('nombre')}}">
                </input>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user">
                    </i>
                </span>
                <input class="form-control" name="apellido" placeholder="Apellidos ..." required="" type="text" value="{{old('apellido')}}">
                </input>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-sunglasses">
                    </i>
                </span>
                <input class="form-control" name="nick" placeholder="NickName ..." required="" type="text" value="{{old('nick')}}">
                </input>
            </div>
        </div>
    </div>
    <br>
        <!--segunda Fila-->
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-home">
                        </i>
                    </span>
                    <input class="form-control" name="direccion" placeholder="Dirección ..." required="" type="text" value="{{old('direccion')}}">
                    </input>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-road">
                        </i>
                    </span>
                    <select class="form-control" name="idciudad">
                    	<option disabled="disabled" selected="selected">---Seleccione la ciudad---</option>	
                        @foreach ($ciudades as $ciu)
                        <option value="{{$ciu->idciudad}}">
                            {{$ciu->descripcion}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
            <!--tercera Fila-->
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone">
                            </i>
                        </span>
                        <input class="form-control" name="telefono" placeholder="Teléfono ..." required="" type="text" value="{{old('telefono')}}">
                        </input>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-envelope">
                            </i>
                        </span>
                        <input class="form-control" name="email" placeholder="Email ..." required="" type="email" value="{{old('email')}}">
                        </input>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-camera">
                            </i>
                        </span>
                        <input class="form-control" name="imagen" type="file">
                        </input>
                    </div>
                </div>
            </div>
            <!--cuarta Fila-->
            <br>
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar">
                                </i>
                            Fecha Nacimiento:</span>
                            <input class="form-control" name="fechanacimiento" required="" type="date" value="{{old('fechanacimiento')}}">
                            </input>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-list-alt">
                                </i>
                            </span>
                            <select class="form-control" name="idcategoria">
                            	<option disabled="disabled" selected="selected">---Seleccione la Categoria---</option>	
                                @foreach ($categorias as $cat)
                                <option value="{{$cat->idcategoria}}">
                                    {{$cat->nombre}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar">
                                </i>
                            Fecha Ingreso:</span>
                            <input class="form-control" name="fechaingreso" required="" type="date" value="{{old('fechaingreso')}}">
                            </input>
                        </div>
                    </div>
                </div>
                <br>
                     <br>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                Guardar
                            </button>
                            <button class="btn btn-danger" type="reset">
                                Cancelar
                            </button>
                        </div>
                    </div>
                    {!! Form::close()!!}




@endsection
                