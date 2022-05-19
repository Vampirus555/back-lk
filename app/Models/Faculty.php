<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'desc',
        'img_path',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function vacancies(): BelongsToMany
    {
        return $this->belongsToMany(Vacancy::class)->using(FacultyVacancy::class);
    }
}
