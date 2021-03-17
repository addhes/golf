<?php

namespace App\Http\Controllers\API;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $lapangan_id = $request->input('lapangan_id');

        if($id)
        {
            $booking = Booking::with(['lapangan'])->find($id);

            if($booking)
            {
                return ResponseFormatter::success(
                    $booking,
                    'Data Booking berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Booking tidak ada',
                    404
                );
            }
            if($lapangan_id)
            {
                $booking->where('lapangan_id', $lapangan_id);
            }

            return ResponseFormatter::success(
                $transaction->paginate($limit),
                'Data List Booking berhasil diambil'
            );
        }
    }

    public function update(Request $request)
    {
        $booking = Booking::findOrFail($id);

        $booking->update($request->all());

        return ResponseFormatter::success($booking, 'Booking berhasil diupdate');
    }
}
