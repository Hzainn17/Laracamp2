@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Admin Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <p>Welcome to the admin dashboard!</p>
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register Data</th>
                                    <th>Paid Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkouts as $checkout)
                                    <tr>
                                        <td>{{ $checkout->User->name }}</td>
                                        <td>{{ $checkout->Camp->title }}</td>
                                        <td>{{ $checkout->Camp->price }}</td>
                                        <td>{{ $checkout->created_at }}</td>
                                        <td>
                                            @if ($checkout->is_paid)
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-warning">Waiting</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$checkout->is_paid)
                                            <form action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">Set Paid</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>  
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No checkouts found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection