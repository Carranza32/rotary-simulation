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
        'measures52' => 'array',
        'measures53' => 'array',
        'measures54' => 'array',
        'measures55' => 'array',
        'measures56' => 'array',
        'measures57' => 'array',
        'monitoring_51' => 'array',
        'monitoring_52' => 'array',
        'monitoring_53' => 'array',
        'monitoring_54' => 'array',
        'monitoring_55' => 'array',
        'monitoring_56' => 'array',
        'monitoring_57' => 'array',
        'headings' => 'array',
        'sources' => 'array',
    ];
}
