<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'assistants',
        'assistants_limit',
        'lat',
        'lng',
        'date',
        'sponsored',
        'active',
    ]; //Decir que campos se pueden usar
}
