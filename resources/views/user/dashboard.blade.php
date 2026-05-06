@extends('layouts.app')

@section('content')


    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $checkout)
                           <tr class="align-middle">
                            <td width="18%">
                                <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{ $checkout->Camp->title }}</strong>
                                </p>
                                <p>
                                    {{ $checkout->created_at->format('M d, Y') }}
                                </p>
                            </td>
                            <td>
                                <strong>${{ number_format($checkout->Camp->price, 0, ',', '.') }}</strong>
                            </td>
                            <td>
                                @if ($checkout->is_paid)
                                    <span class="badge bg-success">
                                        Payment Success
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        Waiting for Payment
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary">
                                    Get Invoice
                                </a>
                            </td>
                        </tr> 
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No Camp Registered
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection