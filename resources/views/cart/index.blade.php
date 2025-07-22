@extends('master')
@section('content')
<div class="container py-5">
    <h2 class="mb-4">My Cart</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'N/A' }}</td>
                    <td>{{ $item->product->price ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ ($item->product->price ?? 0) * $item->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Your cart is empty.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 