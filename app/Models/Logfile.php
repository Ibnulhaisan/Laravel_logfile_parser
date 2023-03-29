<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logfile extends Model
{
    use HasFactory;
    protected $fillable = ['ip', 'user_identity', 'username_client', 'date_time',
        'http_request','url_request','protocol_version','status_code','byte_size','referrer_req','user_agent','cookies_value'];

    public static function insert(array $lineChunks)
    {
        self::insert($lineChunks);
    }


}
