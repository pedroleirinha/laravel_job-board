<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;
    protected $table = 'offered_jobs';

    public static array $experience_levels = ['entry', 'intermidiate', 'senior'];
    public static array $categories = [
        "IT",
        "Finance",
        "Sales",
        "Marketing"
    ];
}
