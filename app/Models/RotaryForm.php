<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RotaryForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rotary_forms';

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'contacts' => 'array',
        'type' => 'array',
        'local_members' => 'array',
        'international_members' => 'array',
        'measures' => 'array',
        'measures' => 'array',
        'headings' => 'array',
        'sources' => 'array',
    ];
}
