@extends('layout')

@section ('content')




{{ Form::model($product, array('method' => 'PUT', 'route' => 
array('product.update', $product->id)))}};

    {{ Form::label('name', 'Product Name:') }}
    {{ Form::text('name') }}
    {{ $errors->first('name') }}
    <p></p>
    {{ Form::label('price', 'Price:') }}
    {{ Form::text('price') }}
    {{ $errors->first('price') }}
    <p></p>
    {{ Form::submit('Update') }}
{{ Form::close() }}
@stop