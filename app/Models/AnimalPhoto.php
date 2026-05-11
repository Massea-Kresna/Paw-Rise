<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalPhoto extends Model
{
    protected $fillable = ['animal_id', 'photo_path', 'sort_order'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    // Helper untuk generate URL foto, support attached_assets & storage
    public function photoUrl(): string
    {
        if (!$this->photo_path) return '';

        if (str_starts_with($this->photo_path, 'http')) {
            return $this->photo_path;
        }
        if (str_starts_with($this->photo_path, 'attached_assets/')) {
            return asset($this->photo_path); // → public/attached_assets/...
        }
        return asset('storage/' . $this->photo_path); // → storage/...
    }
}