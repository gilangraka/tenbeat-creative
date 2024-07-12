<?php

namespace App\Http\Controllers;

use App\Models\RefMitra;
use App\Models\RefUser;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            return $this->adminDashboard();
        } elseif (auth()->user()->hasRole('Mitra')) {
            return $this->mitraDashboard();
        } elseif (auth()->user()->hasRole('Klien')) {
            return $this->klienDashboard();
        }
    }

    public function adminDashboard()
    {
        $ref_mitra = RefMitra::join('ref_rekening', 'ref_rekening.id', '=', 'ref_mitra.id_rekening')
            ->join('users', 'users.id', '=', 'ref_mitra.user_id')
            ->select('ref_mitra.id as mitra_id', 'ref_mitra.*', 'users.id as user_id', 'users.*', 'ref_rekening.*')
            ->get();

        $transaksi = Transaksi::join('transaksi_detail', 'transaksi_detail.transaksi_id', '=', 'transaksi.id')
            ->join('ref_user', 'ref_user.id', '=', 'transaksi.user_id')
            ->join('ref_mitra', 'ref_mitra.id', '=', 'transaksi.mitra_id')
            ->select('transaksi.*', 'transaksi_detail.*', 'ref_user.user_id as user_id', 'ref_mitra.user_id as mitra_id')
            ->get();

        return view('Dashboard.Admin', [
            'ref_mitra' => $ref_mitra,
            'transaksi' => $transaksi
        ]);
    }

    public function mitraDashboard()
    {
        $ref_mitra = RefMitra::where('user_id', auth()->id())->first();
        $validasi = [
            $ref_mitra->nomor_hp,
            $ref_mitra->nomor_rekening,
            $ref_mitra->id_rekening,
            $ref_mitra->resume,
            $ref_mitra->is_active
        ];

        foreach ($validasi as $value) {
            if ($value == null || trim($value == '')) {
                return redirect('profile');
            }
        }

        $list_project = Transaksi::where('mitra_id', null)
            ->join('transaksi_detail', 'transaksi_detail.transaksi_id', '=', 'transaksi.id')
            ->get();
        $amount = $ref_mitra->saldo;

        return view('Dashboard.Mitra', [
            'list_project' => $list_project,
            'saldo' => $amount
        ]);
    }

    public function klienDashboard()
    {
        $ref_user = RefUser::where('user_id', auth()->id())->first();
        if ($ref_user->nomor_hp != null || trim($ref_user->nomor_hp != '')) {
            $trx = Transaksi::where('transaksi.user_id', $ref_user->id)
                ->join('transaksi_detail', 'transaksi_detail.transaksi_id', '=', 'transaksi.id')
                ->join('ref_status', 'ref_status.id', '=', 'transaksi.status_id')
                ->get();

            return view('Dashboard.User', [
                'trx' => $trx,
                'data_user' => $ref_user
            ]);
        } else {
            return redirect('profile');
        }
    }

    public function mitraUpdate(Request $request)
    {
        $ref_mitra = RefMitra::where('user_id', auth()->id())->first();

        $file = $request->file('resume');
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/resume', $fileName);

        $nomor_hp = $request->nomor_hp;
        if (isset($nomor_hp[0]) && $nomor_hp[0] === '0') {
            $nomor_hp = substr_replace($nomor_hp, '62', 0, 1);
        }

        $ref_mitra->update([
            'nomor_hp' => $nomor_hp,
            'nomor_rekening' => $request->nomor_rekening,
            'id_rekening' => $request->id_rekening,
            'resume'    => $fileName
        ]);

        return back();
    }

    public function klienUpdate(Request $request)
    {
        $ref_user = RefUser::where('user_id', auth()->id())->first();

        $nomor_hp = $request->nomor_hp;
        if (isset($nomor_hp[0]) && $nomor_hp[0] === '0') {
            $nomor_hp = substr_replace($nomor_hp, '62', 0, 1);
        }

        $ref_user->update([
            'nomor_hp' => $nomor_hp
        ]);

        return back();
    }
}
