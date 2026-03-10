@extends('frontend.layouts.layout')

@section('content')
    @foreach ($components->sortBy('position') as $component)
        @if ($component->name === 'feature')
            <x-backend.edit-page.feature :feature="$feature" />
        @elseif ($component->name === 'hero')
            <x-backend.edit-page.hero :hero="$hero" />
        @elseif($component->name === 'header')
            <x-backend.edit-page.header :header="$header" :sections="$sections" />
        @elseif ($component->name === 'overview')
            <x-backend.edit-page.overview :overview="$overview" />
        @endif
    @endforeach

    <div class="modal fade @if ($errors->any()) show @endif" id="orderModal" tabindex="-1"
        aria-labelledby="orderModalLabel" aria-hidden="{{ $errors->any() ? 'false' : 'true' }}"
        style="{{ $errors->any() ? 'display:block;' : '' }}">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Order: {{ $hero->data['title'] }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- ✅ Error messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Product preview -->
                    <img class="img-fluid mb-3" src="{{ asset('storage/uploads/heroes/' . $hero->data['image']) }}"
                        alt="">
                    <p>{{ $hero->data['description'] }}</p>
                    <p><b>Price:</b> {{ $hero->data['price'] }} Taka</p>

                    <!-- Order form -->
                    <form action="{{ route('order', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="mb-3">
                            <label for="customerName" class="form-label">Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="customerName"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="customerEmail" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customerPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                id="customerPhone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customerAddress" class="form-label">Shipping Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="customerAddress" name="address" rows="3"
                                required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customerQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                id="customerQuantity" name="quantity" min="1" value="{{ old('quantity', 1) }}"
                                required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
