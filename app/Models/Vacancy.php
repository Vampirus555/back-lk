<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vacancy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'desc',
        'img_path',
        'link',
        'salary',
        'workplace',
        'level'
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function vacancyType(): BelongsTo
    {
        return $this->belongsTo(VacancyType::class);
    }

    public function faculties(): BelongsToMany
    {
        // return $this->belongsToMany(Faculty::class)->using(FacultyVacancy::class);
        return $this->belongsToMany(
            Faculty::class,
            'faculties_vacancies',
            'faculty_id',
            'vacancy_id'
        );
    }

    public function functions(): BelongsToMany
    {
        // return $this->belongsToMany(VacancyFunction::class)->using(VacanciesFunctions::class);
        return $this->belongsToMany(
            VacancyFunction::class,
            'vacancies_functions',
            'vacancy_id',
            'vacancy_function_id'
        );
    }

}
