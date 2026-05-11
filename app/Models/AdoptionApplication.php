<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionApplication extends Model
{
    protected $fillable = [
        'animal_id',
        'user_id',
        'full_name',
        'whatsapp',
        'email',
        'address',
        'reason',
        'experience',
        'agreement',
        'status',
        'shelter_note', // ← tambahkan, ada di migration
    ];

    protected $casts = [
        'agreement' => 'boolean', // ← tambahkan, agar cast benar
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper label status untuk tampilan
    public function statusLabel(): string
    {
        return match($this->status) {
            'menunggu'  => 'Menunggu',
            'disetujui' => 'Disetujui',
            'ditolak'   => 'Ditolak',
            default     => ucfirst($this->status),
        };
    }

    // Helper label experience sesuai Figma
    public function experienceLabel(): string
    {
        return match($this->experience) {
            'belum'  => 'Belum Pernah',
            'pernah' => 'Pernah di Masa Lalu',
            'sedang' => 'Sedang Memelihara',
            default  => ucfirst($this->experience),
        };
    }
}