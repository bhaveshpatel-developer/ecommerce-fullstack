<form wire:submit.prevent="placeOrder">
    <input type="text" wire:model="customer_name" placeholder="Your Name">
    <input type="email" wire:model="email" placeholder="Your Email">
    <input type="number" wire:model="quantity" placeholder="Quantity">
    <button type="submit">Place Order</button>
</form>
