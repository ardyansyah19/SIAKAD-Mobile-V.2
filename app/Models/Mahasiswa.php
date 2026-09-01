<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'user_id',
        'nim',
        'nama',
        'email',
        'program_studi',
        'fakultas',
        'angkatan',
        'semester',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'status',      // aktif | cuti | lulus | dropout
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
