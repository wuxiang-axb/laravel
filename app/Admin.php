<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
		//protected 关键字，和$table不能错，$primmarykey，的K是大写
        //指定User类可以操作user这个表，主键是uid
        protected $table ='admin';
        protected $primaryKey='id';

        protected $fillable = ['name','pass','time']; //字段白名单

        public $timestamps = false; //不维护 创建和修改时间
        

        //方法可以自定义：
        /*public function a(){
            return $this->get()->all();
        
        }   */ 
}
