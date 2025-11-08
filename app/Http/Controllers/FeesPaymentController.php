<?php

namespace App\Http\Controllers;

use App\Models\FeesPayment;
use Illuminate\Http\Request;

class FeesPaymentController extends Controller
{
    public function AllFeesPayments()
    {
        $payments = FeesPayment::latest()->get();
        return view('backend.payment.all_payment', compact('payments'));
    }

    // Show create form
    public function AddFeesPayment()
    {
        return view('backend.payment.add_payment');
    }

    // Store new fees payment
    public function StoreFeesPayment(Request $request)
    {
        $data = [
            'payment_method' => $request->payment_method,
            'payment_type' => $request->payment_type,
            'payment_name' => $request->payment_name,
            'btc_address' => $request->btc_address,
            'crypto_type' => $request->crypto_type,
            'status' => $request->status,
        ];

        if ($request->file('qr_code')) {
            $file = $request->file('qr_code');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/qr_codes/'), $filename);
            $data['qr_code'] = $filename;
        }

        FeesPayment::create($data);

        $notification = array(
            'message' => 'Fees Payment Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.fees.payments')->with($notification);
    }

    // Show edit form
    public function EditFeesPayment($id)
    {
        $payment = FeesPayment::findOrFail($id);
        return view('backend.payment.edit_payment', compact('payment'));
    }

    // Update fees payment
    public function UpdateFeesPayment(Request $request, $id)
    {
        $payment = FeesPayment::findOrFail($id);

        $data = [
            'payment_method' => $request->payment_method,
            'payment_type' => $request->payment_type,
            'payment_name' => $request->payment_name,
            'btc_address' => $request->btc_address,
            'crypto_type' => $request->crypto_type,
            'status' => $request->status,
        ];

        if ($request->file('qr_code')) {
            // Delete old image if exists
            if ($payment->qr_code && file_exists(public_path('upload/qr_codes/' . $payment->qr_code))) {
                unlink(public_path('upload/qr_codes/' . $payment->qr_code));
            }

            $file = $request->file('qr_code');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/qr_codes/'), $filename);
            $data['qr_code'] = $filename;
        }

        $payment->update($data);

        $notification = array(
            'message' => 'Fees Payment Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.fees.payments')->with($notification);
    }

    // Delete fees payment
    public function DeleteFeesPayment($id)
    {
        $payment = FeesPayment::findOrFail($id);

        // Delete image if exists
        if ($payment->qr_code && file_exists(public_path('upload/qr_codes/' . $payment->qr_code))) {
            unlink(public_path('upload/qr_codes/' . $payment->qr_code));
        }

        $payment->delete();

        $notification = array(
            'message' => 'Fees Payment Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
