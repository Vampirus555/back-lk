<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FacultyVacancy extends Pivot
{
    protected $table = 'faculties_vacancies';
}
