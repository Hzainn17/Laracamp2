<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
Use Illuminate\Support\Facades\Mail;
use App\Mail\Checkout\Paid;


class CheckoutController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        $checkout->is_paid = true;
        $checkout->save();

        // sending email
        Mail::to($checkout->User->email)->send(new Paid($checkout));

        return redirect()->route('admin.dashboard')->with('success', "Checkout #{$checkout->id} berhasil diproses.");

    }
}
