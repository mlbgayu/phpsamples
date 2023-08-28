<?php

namespace App;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
class Helper
{


    public static function redis_get($redis_key){
        try{
            if($redis_key != ''){
                return Redis::get($redis_key);
           }
        }catch (\Exception $ex){
            \Log::error($ex->getMessage());

        }

    }

    public static function redis_set($redis_key, $result){
        try{

            if($redis_key!='' && $result !=''){
                Redis::set($redis_key,$result);
            }

        }catch (\Exception $ex){
            Log::error($ex->getMessage());

        }

    }




}
