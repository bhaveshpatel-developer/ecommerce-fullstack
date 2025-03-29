<div>
    <h2>Shopping Cart</h2>
    <ul>
        @foreach($cart as $item)
            <li>{{ $item['name'] }} - ${{ $item['price'] }}</li>
        @endforeach
    </ul>
</div>
