<?php

namespace App\Http\Controllers\API;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class LapanganController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_lapangan = $request->input('nama_lapangan');
        $harga_dari = $request->input('harga_from');
        $harga_ke = $request->input('harga_ke');


        if($id)
        {
            $lapangan = Lapangan::find($id);

            if($food)
            {
                return ResponseFormatter::success(
                    $lapangan,
                    'Data Lapangan berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data lapangan tidak ada',
                    404
                );
            }
            
        }

        $lapangan = Lapangan::query();

        if($nama_lapangan)
        {
            $lapangan->where('nama_lapangan', 'like', '%' . $lapangan . '%');
        }

        if($harga_dari)
        {
            $lapangan->where('harga', '<=', $harga_dari);
        }

        if($harga_ke)
        {
            $lapangan->where('harga', '>=', $harga_ke);
        }

        return ResponseFormatter::success(
            $lapangan->paginate($limit),
            'Data list lapangan berhasil diambil'
        );
    }
}
 