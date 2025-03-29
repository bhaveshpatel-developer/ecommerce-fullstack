@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">Shop</h1>

    <!-- Search Form -->
    <form action="{{ route('shop.index') }}" method="GET" class="mb-6">
        <input type="text" name="search" placeholder="Search products..."
            class="border p-2 rounded w-full">
    </form>

    <!-- Product Listing -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="border p-4 rounded shadow">
                <a href="{{ route('shop.product', $product) }}">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover">
                    <h2 class="text-xl font-semibold mt-2">{{ $product->name }}</h2>
                    <p class="text-gray-600">${{ $product->price }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
