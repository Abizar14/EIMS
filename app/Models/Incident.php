<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_id',
        'reporter_id',
        'technician_id',
        'description',
        'status',
        'resolution_notes',
        'resolved_at',
    ];

    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
