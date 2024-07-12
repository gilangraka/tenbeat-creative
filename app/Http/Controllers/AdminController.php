<?php

namespace App\Http\Controllers;

use App\Models\RefMitra;
use App\Models\RefUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function actionMitra($mitra_id, $status)
    {
        if ($status == 0 || $status == 1) {
            $ref_mitra = RefMitra::find($mitra_id);
            $ref_mitra->update([
                'is_active' => $status
            ]);
            return back();
        } else {
            abort(403, "Oops, kode salah");
        }
    }

    public function charge($id_user)
    {
        try {
            $client = RefUser::find($id_user);
            $client->update([
                'count_video' => 30,
                'subscribe'   => Carbon::now()->addDays(30)
            ]);

            return response()->json([
                'message' => 'Berhasil Subscribe'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Oops, error...'
            ]);
        }
    }
}
