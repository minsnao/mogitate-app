@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>

    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
    <p>価格: ¥{{ number_format($product->price) }}</p>
    <p>{{ $product->description }}</p>

    <a href="{{ url('/products') }}">戻る</a>
@endsection