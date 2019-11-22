<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userv extends Model
{
     protected $table ='user';
     protected $primaryKey='id';
     protected $fillable = ['name','pass','time']; //字段白名单
     public $timestamps = false; //不维护 创建和修改时间
}
