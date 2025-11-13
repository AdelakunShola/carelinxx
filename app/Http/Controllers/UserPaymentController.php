<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeesPayment;
use App\Models\UserPayment;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{
    public function index()
    {
        $payments = UserPayment::with(['user', 'feesPayment'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.user_payments.index', compact('payments'));
    }

    public function show($id)
    {
        $payment = UserPayment::with(['user', 'feesPayment'])->findOrFail($id);
        return view('backend.user_payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = UserPayment::with(['user', 'feesPayment'])->findOrFail($id);
        $feesPayments = FeesPayment::active()->get();
        return view('backend.user_payments.edit', compact('payment', 'feesPayments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fees_payment_id' => 'required|exists:fees_payments,id',
            'amount' => 'required|numeric|min:0.01',
            'sender_address' => 'required|string',
            'status' => 'required|in:pending,confirmed,rejected',
            'admin_note' => 'nullable|string',
            'transaction_proof' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $payment = UserPayment::findOrFail($id);
        $feesPayment = FeesPayment::findOrFail($request->fees_payment_id);

        $data = [
            'fees_payment_id' => $request->fees_payment_id,
            'payment_method' => $feesPayment->payment_method,
            'payment_type' => $feesPayment->payment_type,
            'payment_name' => $feesPayment->payment_name,
            'crypto_type' => $feesPayment->crypto_type,
            'amount' => $request->amount,
            'sender_address' => $request->sender_address,
            'status' => $request->status,
            'admin_note' => $request->admin_note,
        ];

        // Handle file upload if new proof is provided
        if ($request->hasFile('transaction_proof')) {
            // Delete old proof if exists
            if ($payment->transaction_proof && file_exists(public_path('upload/payment_proofs/' . $payment->transaction_proof))) {
                unlink(public_path('upload/payment_proofs/' . $payment->transaction_proof));
            }

            $image = $request->file('transaction_proof');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/payment_proofs'), $imageName);
            $data['transaction_proof'] = $imageName;
        }

        // Set confirmed_at if status is changed to confirmed
        if ($request->status == 'confirmed' && $payment->status != 'confirmed') {
            $data['confirmed_at'] = now();
        }

        $payment->update($data);

        $notification = array(
            'message' => 'Payment updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user.payments')->with($notification);
    }

    public function confirm(Request $request, $id)
    {
        $payment = UserPayment::findOrFail($id);
        
        $payment->update([
            'status' => 'confirmed',
            'confirmed_at' => now(),
            'admin_note' => $request->admin_note
        ]);

        $notification = array(
            'message' => 'Payment confirmed successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'admin_note' => 'required|string'
        ]);

        $payment = UserPayment::findOrFail($id);
        
        $payment->update([
            'status' => 'rejected',
            'admin_note' => $request->admin_note
        ]);

        $notification = array(
            'message' => 'Payment rejected!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }
     }