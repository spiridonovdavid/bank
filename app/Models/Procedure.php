<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Procedure extends Model
{
    use AsSource;

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'birth_date',
        'case_number',
        'court_name',
        'inn',
        'snils',
        'manager',
        'comment'
    ];
}
