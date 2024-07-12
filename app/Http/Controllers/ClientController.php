<?php

namespace App\Http\Controllers;

use App\Models\RefUser;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function addVideo(Request $request)
    {
        $keterangan = $request->keterangan;
        $file = $request->file('unggahan');
        $fileName = Str::random(10) . "." . $file->getClientOriginalExtension();
        $file->storeAs('public/unggahan', $fileName);

        $klien_id = RefUser::where('user_id', auth()->id())->pluck('id')[0];
        $count_video = RefUser::where('user_id', auth()->id())->pluck('count_video')[0];
        RefUser::where('user_id', auth()->id())->update([
            'count_video' => $count_video - 1
        ]);

        $transaksi = Transaksi::create([
            'user_id' => $klien_id
        ]);
        DB::table('transaksi_detail')->insert([
            'transaksi_id' => $transaksi->id,
            'keterangan' => $keterangan,
            'file_unggahan' => $fileName,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return back();
    }
}
