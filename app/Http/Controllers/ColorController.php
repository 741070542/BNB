<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    /**
     * 颜色列表
     *
     * @return \Illuminate\Http\Response
     */
    public function lists(Request $request)
    {
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }else{
            $user_id = user_id($key);  //用户id
        }
        $data = DB::table('colors')->where('user_id',$user_id)->get()->toArray();
        if($data){
            return get_op_put(0,$data,'请求成功');
        }else{
            return get_op_put(2,[],'请求失败');
        }
    }

    /*
     * 设置颜色备注
     */
    public function edit(Request $request){
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }else{
            $user_id = user_id($key);  //用户id
        }
        $id = $request->input('id');
        if(!$id){
            return get_op_put(1,[],'缺少参数id');
        }
        $id = $request->input('id');
        if(!$id){
            return get_op_put(1,[],'缺少参数id');
        }
        $save['remark'] = $request->input('remark');
        $data = DB::table('colors')->where('id',$id)->update($save);
        if($data){
            return get_op_put(0,[],'请求成功');
        }else{
            return get_op_put(2,[],'请求失败');
        }
    }
}
