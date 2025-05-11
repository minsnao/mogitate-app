@extends('layouts.app')

<style>
svg.w-5.h-5 {
    width: 30px;
    height: 30px;
}
</style>
@section('content')
<h1>商品一覧</h1>
<h2>
    <a href="/products/register">+ 商品を追加</a>
</h2>
@foreach ($products as $product)
    <div>
        <a href="{{ url('/products/' . $product->id) }}">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">
            <p>{{ $product->name }}</p>
            <p>¥{{ $product->price }}</p>
        </a>
    </div>
@endforeach
<div class="pagination">
    {{ $products->links() }}
</div>
@endsection
