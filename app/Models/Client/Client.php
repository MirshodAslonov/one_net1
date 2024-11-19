<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'is_active'
    ];
}
