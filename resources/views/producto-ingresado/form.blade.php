<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Producto') }}
            {{ Form::select('productosId', $productos, $productoIngresado->productosId, ['class' => 'form-control' . ($errors->has('productosId') ? ' is-invalid' : '')]) }}
            {!! $errors->first('productosId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad a Ingresar') }}
            {{ Form::number('cantidadIngresar', $productoIngresado->cantidadIngresar, ['class' => 'form-control' . ($errors->has('cantidadIngresar') ? ' is-invalid' : '')]) }}
            {!! $errors->first('cantidadIngresar', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Ingresar</button>
        <a class="btn btn-primary" href="{{ route('producto-ingresado.index') }}"> Atras</a>
    </div>
</div>