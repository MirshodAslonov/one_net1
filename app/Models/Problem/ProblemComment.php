<?php

namespace App\Models\Problem;

use App\Models\Client\Client;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProblemComment extends Model
{
    use HasFactory;
    public $table = 'problem_comments';
    protected $fillable = [
        'problem',
        'problem_id',
        'user_id',
        'updated_at'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
