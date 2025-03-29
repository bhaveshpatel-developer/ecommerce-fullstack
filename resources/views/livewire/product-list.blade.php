<select wire:model="category_id">
    <option value="">All Categories</option>
    @foreach(App\Models\Category::all() as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>

<div class="grid grid-cols-3 gap-4">
    @foreach($products as $product)
        <div class="border p-4">
            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-40 object-cover">
            <h3 class="font-bold text-lg">{{ $product->name }}</h3>
            <p class="text-gray-700">${{ number_format($product->price, 2) }}</p>
            <p class="text-sm text-gray-500">
                Categories: {{ implode(', ', $product->categories->pluck('name')->toArray()) }}
            </p>
            <a href="{{ route('product.details', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 mt-2 block text-center">
                View Details
            </a>
        </div>
    @endforeach
</div>
