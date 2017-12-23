<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/6
 * Time: 10:49
 */
class UserController extends \App\Http\Controllers\Controller{
    public function index(){
        $data = \Illuminate\Support\Facades\DB::select("select * from 'user'");
        return $data;
    }
}