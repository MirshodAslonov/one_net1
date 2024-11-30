<?php

namespace App\Models;

use App\Models\Client\Client;
use App\Models\Problem\ProblemComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProblemClient extends Model
{
    use HasFactory;
    public $table = 'client_problems';
    protected $fillable = [
        'client_id',
        'status',
        'problem',
        'answer',
        'problem_user_id',
        'answer_user_id',
        'updated_at'
    ];

    public function image(): HasMany
    {
        return $this->hasMany(File::class,'problem_id','id');
    }

    public function problem_user(): HasOne
    {
        return $this->hasOne(User::class,'id','problem_user_id');
    }

    public function answer_user(): HasOne
    {
        return $this->hasOne(User::class,'id','answer_user_id');
    }
    public function client(): HasOne
    {
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function problems(): HasMany
    {
        return $this->hasMany(ProblemComment::class,'problem_id','id');
    }

}
