<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeesPayment;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = FeesPayment::active()->get();
        return view('frontend.payment.index', compact('payments'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'fees_payment_id' => 'required|exists:fees_payments,id',
            'amount' => 'required|numeric|min:0.01',
            'transaction_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'sender_address' => 'required|string',
        ]);

        $feesPayment = FeesPayment::findOrFail($request->fees_payment_id);

        // Handle file upload
        $proofPath = null;
        if ($request->hasFile('transaction_proof')) {
            $image = $request->file('transaction_proof');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/payment_proofs'), $imageName);
            $proofPath = $imageName;
        }

        // Generate unique transaction ID
        $transactionId = 'TXN-' . strtoupper(Str::random(10)) . '-' . time();

        // Create payment record
        $payment = UserPayment::create([
            'user_id' => Auth::id(),
            'fees_payment_id' => $request->fees_payment_id,
            'payment_method' => $feesPayment->payment_method,
            'payment_type' => $feesPayment->payment_type,
            'payment_name' => $feesPayment->payment_name,
            'crypto_type' => $feesPayment->crypto_type,
            'amount' => $request->amount,
            'transaction_id' => $transactionId,
            'transaction_proof' => $proofPath,
            'sender_address' => $request->sender_address,
            'status' => 'pending',
        ]);

        $notification = array(
            'message' => 'Payment submitted successfully! Your transaction is pending approval.',
            'alert-type' => 'success'
        );

        return redirect()->route('payment.history')->with($notification);
    }

    public function history()
    {
        $payments = UserPayment::where('user_id', Auth::id())
            ->with('feesPayment')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.payment.history', compact('payments'));
    }
}