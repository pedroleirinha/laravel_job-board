<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
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

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query->when(
            $filters['search'] ?? null,
            function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->whereLike('title', "%$search%")
                        ->orWhereLike('description', "%$search%");
                });
            }
        )->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
            $query->where('salary', ">=", $minSalary);
        })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
            $query->where('salary', "<=", $maxSalary);
        })->when($filters['experience'] ?? null, function ($query, $experience) {
            $query->whereLike('experience', $experience);
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->whereLike('category', $category);
        });
    }
}
