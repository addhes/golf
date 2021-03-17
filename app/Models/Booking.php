<?php

namespace App\Models;

use App\Models\Lapangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'booking';

    protected $fillable = [
        'lapangan_id','kuantitas', 'total'
    ];

    public function lapangan()
    {
        return $this->hasOne(Lapangan::class, 'id', 'lapangan_id');
    }
}
