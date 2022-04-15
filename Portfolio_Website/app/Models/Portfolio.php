<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'portfolio';

    protected $fillable = ['id', 'user_id','name','email','telephone','photo','self_description','updated_at','created_at'];
}
