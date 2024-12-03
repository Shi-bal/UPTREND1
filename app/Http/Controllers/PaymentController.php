<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cod,credit_card,paypal',
            // Add other validation rules as necessary
        ]);

        // Get the authenticated user
        $user = Auth::user();
        $userId = $user->id;

        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        foreach ($cartItems as $item) {
            $order = new Order();
            $order->user_id = $userId; 
            $order->payment_status = 'Pending'; 
            $order->product_id = $item->product_id; 
            $order->quantity = $item->quantity; 
            // Add more fields latr

            switch ($request->payment_method) {
                case 'cod':
                    //no additional processing required
                    $order->payment_status = 'Completed'; 
                    break;

                case 'credit_card':
                    // $paymentResult = $this->processCreditCardPayment($request);
                    // if ($paymentResult->isSuccessful()) {
                    //     $order->payment_status = 'Completed';
                    // }
                    break;

                case 'paypal':
                    // $paymentResult = $this->processPayPalPayment($request);
                    // if ($paymentResult->isSuccessful()) {
                    //     $order->payment_status = 'Completed';
                    // }
                    break;
            }

            // Log the order details for debugging
            Log::info('Creating order:', [
                'user_id' => $userId,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'payment_status' => $order->payment_status,
            ]);

            // Save the order
            $order->save();
        }

        Order::where('user_id', $userId)->delete();

        return redirect()->back()->with('success', 'Order successful!');
    }
}