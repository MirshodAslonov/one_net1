<?php

namespace App\Models\Client;

use App\Models\Branch\Branch;
use App\Models\Comment\Comment;
use App\Models\File;
use App\Models\Organ\Organ;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory;
    public $table = 'clients';
    protected $fillable = [
        'name_organ',
        'mgmt_ip',
        'vlan',
        'ip',
        'port',
        'zayafka',
        'client_number',
        'client_name',
        'speed',
        'date_connect',
        'stp_zayafka',
        'vlan_ip',
        'atc',
        'location',
        'branch_id',
        'organ_id',
        'is_active',
        'user_id'
    ];

    public function image(): HasMany
    {
        return $this->hasMany(File::class,'client_id','id');
    }
    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class,'id','branch_id');
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function organ(): HasOne
    {
        return $this->hasOne(Organ::class,'id','organ_id');
    }

    public function comment():HasOne
    {
        return $this->HasOne(Comment::class,'client_id','id');
    }
}
