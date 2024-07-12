<?php

namespace App\Http\Controllers;

use App\Models\RefUser;
use App\Models\Topup;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Illuminate\Support\Str;
use Midtrans\Transaction;

class TopupController extends Controller
{
    public function submitTopup()
    {
        $id_klien = RefUser::where('user_id', Auth::id())->pluck('id')->first();
        $transaction = Topup::create([
            'code' => 'TOPUP-' . rand(100000, 999999),
            'id_klien' => $id_klien,
            'amount' => 2500000
        ]);

        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 2499000,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        $this->response['snap_token'] = $snapToken;

        return redirect()->route('checkout', $transaction);
    }

    public function checkout($transaction)
    {
        $token = Topup::where('id', $transaction)->pluck('snap_token')->first();
        return view('Dashboard.Checkout', compact('token'));
    }

    public function setCount()
    {
        $now = Carbon::now('Asia/Bangkok');
        $noww = $now->addDays(30);
        RefUser::where('user_id', Auth::id())->update([
            'count_video' => 30,
            'subscribe' => $noww
        ]);

        return redirect('/dashboard');
    }
}
