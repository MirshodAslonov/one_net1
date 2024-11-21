<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public $table = "files";
    public $fillable = [
        'client_id',
        'path',
        'url',
        'image_type',
        'mime_type',
        'size',
        'is_active'
    ];
}
