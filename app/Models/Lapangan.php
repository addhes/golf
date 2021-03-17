<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lapangan extends Model
{
    use HasFactory;

    protected $table = 'lapangan';

    protected $fillable = [
        'nama_lapangan', 'harga', 'foto_lapangan',
    ];

    public function getFotoLapangan()
    {
        return url('') . Storage::url($this->attribute['foto_lapangan']);
    }
}
