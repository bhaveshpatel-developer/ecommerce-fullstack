@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-96 w-full object-cover rounded">
        <h1 class="text-3xl font-bold mt-4">{{ $product->name }}</h1>
        <p class="text-gray-600 mt-2">${{ $product->price }}</p>
        <p class="mt-4">{{ $product->description }}</p>

        <!-- Order Form -->
        <form action="{{ route('shop.order') }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <input type="text" name="customer_name" placeholder="Your Name" class="border p-2 rounded w-full mb-2">
            <input type="email" name="email" placeholder="Your Email" class="border p-2 rounded w-full mb-2">
            <input type="number" name="quantity" min="1" placeholder="Quantity" class="border p-2 rounded w-full mb-2">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Order Now</button>
        </form>
    </div>
</div>
@endsection
