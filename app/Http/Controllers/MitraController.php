<?php

namespace App\Http\Controllers;

use App\Models\RefMitra;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MitraController extends Controller
{
    public function getMitraID()
    {
        $mitra_id = RefMitra::where('user_id', auth()->id())->pluck('id')->first();
        return $mitra_id;
    }

    public function applyProject(Request $request)
    {
        $mitra_id = $this->getMitraID();

        $id_trx = $request->id_trx;
        $trx = Transaksi::find($id_trx);
        $trx->mitra_id = $mitra_id;
        $trx->status_id = 2;
        $trx->save();

        return back();
    }

    public function projects()
    {
        $projects = Transaksi::where('mitra_id', $this->getMitraID())
            ->join('transaksi_detail', 'transaksi_detail.transaksi_id', '=', 'transaksi.id')
            ->join('ref_status', 'ref_status.id', '=', 'transaksi.status_id')
            ->join('ref_user', 'ref_user.id', '=', 'transaksi.user_id')
            ->get();
        return view('Projects.index', [
            'projects' => $projects
        ]);
    }

    public function setLuaran(Request $request)
    {
        $trx_id = $request->trx_id;
        $file = $request->file('luaran');
        $fileName = Str::random(10) . "." . $file->getClientOriginalExtension();
        $file->storeAs('public/luaran', $fileName);

        DB::table('transaksi_detail')
            ->where('transaksi_id', $trx_id)
            ->update([
                'output' => $fileName,
                'updated_at' => now()
            ]);

        return back();
    }

    public function setSelesai(Request $request)
    {
        $ref_mitra = RefMitra::where('user_id', auth()->id())->first();
        $mitra_saldo = $ref_mitra->saldo;
        RefMitra::where('user_id', auth()->id())->update([
            'saldo' => $mitra_saldo + 40000
        ]);

        $trx_id = $request->trx_id;
        $trx = Transaksi::find($trx_id);
        $trx->status_id = 3;
        $trx->save();
        return back();
    }
}
