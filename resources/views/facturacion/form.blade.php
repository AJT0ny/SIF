<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cliente') }}
            {{ Form::select('clienteId', $clientes, $facturacion->clienteId, ['class' => 'form-control' . ($errors->has('clienteId') ? ' is-invalid' : '')]) }}
            {!! $errors->first('clienteId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('producto') }}
            {{ Form::select('productoId', $productos, $facturacion->productoId, ['class' => 'form-control' . ($errors->has('productoId') ? ' is-invalid' : '')]) }}
            {!! $errors->first('productoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion_cliente') }}
            {{ Form::select('direccion_cliente',$clientes, $facturacion->direccion_cliente, ['class' => 'form-control' . ($errors->has('direccion_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Direccion Cliente']) }}
            {!! $errors->first('direccion_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $facturacion->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $facturacion->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ISV') }}
            {{ Form::text('ISV', $facturacion->ISV, ['class' => 'form-control' . ($errors->has('ISV') ? ' is-invalid' : ''), 'placeholder' => 'Isv']) }}
            {!! $errors->first('ISV', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('subtotal') }}
            {{ Form::text('subtotal', $facturacion->subtotal, ['class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal']) }}
            {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $facturacion->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>