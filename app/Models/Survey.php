<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'ease_of_use',
        'interface_intuitiveness',
        'responsiveness',
        'feature_completeness',
        'feature_suitability',
        'stability',
        'ui_design',
        'customer_support',
        'security_and_privacy',
        'additional_feedback',
    ];
}
