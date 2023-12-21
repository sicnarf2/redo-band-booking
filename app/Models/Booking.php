<?php

namespace App\Models;

use App\Models\Band;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
