@extends('backend.dashboard.layouts.layout')

@section('content')
    <div class="container-fluid mt-4">
        <h1 class="mb-4">Static Items Table</h1>

        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">Page List</h5>
                <a class="btn btn-link" href="{{ route('page.create') }}">Create Page</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        @if (Route::is('product.index'))
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        @endif
                        @if (Route::is('order.list'))
                            <th scope="col">Product</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Email</th>
                            <th scope="col">Customer Phone</th>
                            <th scope="col">Shipping Address</th>
                            <th scope="col">Status</th>
                        @endif
                    </thead>
                    <tbody>
                        @if (Route::is('product.index'))
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        {{ $product->page }}
                                        <a href="{{ route('edit.page', $product->id) }}"
                                            class="btn btn-sm btn-outline-primary"><i class="far fa-edit"></i></a>
                                        <button class="btn btn-sm btn-outline-danger"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        @if (Route::is('order.list'))
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_email }}</td>
                                    <td>{{ $order->customer_phone }}</td>
                                    <td>{{ $order->shipping_address }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                id="statusDropdown{{ $order->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                {{ ucfirst($order->status) }}
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $order->id }}">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('order.status.update', ['order' => $order->id, 'status' => 'pending']) }}">Pending</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('order.status.update', ['order' => $order->id, 'status' => 'processing']) }}">Processing</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('order.status.update', ['order' => $order->id, 'status' => 'shipped']) }}">Shipped</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('order.status.update', ['order' => $order->id, 'status' => 'delivered']) }}">Delivered</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('order.status.update', ['order' => $order->id, 'status' => 'returned']) }}">Returned</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('order.status.update', ['order' => $order->id, 'status' => 'cancelled']) }}">Cancelled</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
