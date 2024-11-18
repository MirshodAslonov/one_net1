<?php

namespace App\Models\Organ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organ extends Model
{
    use HasFactory;
    public $table = 'organs';
    protected $fillable = ['id','name','is_active'];
}
