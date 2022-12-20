<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'state_id',
        'name',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    /**
     * Model relationship
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
