<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleController extends Controller
{
    /**
     * 取消订单
     *
     * @return \Illuminate\Http\Response
     */
    public function deorder(Request $request){
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
        $status = DB::table('orders')->where('id',$id)->value('status');
        if($status>2){
            return get_op_put(2,[],'取消失败');
        }
        if($status == 1){
            $status = 3;
            $beginThismonth=strtotime(date('Y-m'));
            $orders = DB::table('orders')->where('id',$id)->first();
            $orders = object_array($orders);
            $firstday = firstday($orders['sta_time']);
            $statistics = DB::table('statistics')->where('user_id',$user_id)->where('firstday',$firstday)->first();
            $statistics = object_array($statistics);
            if($beginThismonth<$orders['sta_time']){
                $save['thismonth_come'] = $statistics['thismonth_come']-1;
            }else{
                $save['lastmonth_come'] = $statistics['lastmonth_come']-1;
            }
            $save['thismonth_revenue'] = $statistics['thismonth_revenue']-$orders['revenue'];
            DB::table('statistics')->where('user_id',$user_id)->where('firstday',$firstday)->update($save);
        }else{
            $status = 4;
        }
        $save = DB::table('orders')->where('id',$id)->update(array("status"=>$status));
        if($save == 1){
            return get_op_put(0,[],'取消成功');
        }else{
            return get_op_put(2,[],'取消失败');
        }
    }

    /*
     * 删除房型
     */
    public function detype(Request $request){
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
        $houses = DB::table('houses')->where('type_id',$id)->where('status',1)->first();
        if($houses){
            return get_op_put(2,[],'房型下面存在房间，无法删除');
        }
        $save = DB::table('types')->where('id',$id)->update(array("status"=>2));
        if($save == 1){
            return get_op_put(0,[],'删除成功');
        }else{
            return get_op_put(2,[],'删除失败');
        }
    }

    /*
     * 删除房间
     */
    public function dehouses(Request $request){
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
        $time = time();
        $houses = DB::table('orders')->where('house_id',$id)->where('status',1)->where('com_time','>',$time)->first();
        if($houses){
            return get_op_put(2,[],'存在未完成的预定订单，无法删除');
        }
        $save = DB::table('houses')->where('id',$id)->update(array("status"=>2));
        if($save == 1){
            return get_op_put(0,[],'删除成功');
        }else{
            return get_op_put(2,[],'删除失败');
        }
    }

    /*
     * 删除来源
     */
    public function desources(Request $request){
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
        $save = DB::table('sources')->where('id',$id)->update(array("status"=>2));
        if($save == 1){
            return get_op_put(0,[],'删除成功');
        }else{
            return get_op_put(2,[],'删除失败');
        }
    }
}
