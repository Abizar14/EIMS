<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'serial_number',
        'purchase_date',
        'location',
        'status',
    ];

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }
}
