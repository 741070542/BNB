<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    /**
     * 添加订单
     *
     * @return \Illuminate\Http\Response
     */
    public function add_order(Request $request)
    {
        $house_id = $request->input('house_id');
        if(!$house_id){
            return get_op_put(1,[],'缺少参数house_id');
        }
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }
        $status = $request->input('status');
        if(!$status){
            return get_op_put(1,[],'缺少参数status');
        }
        $source_id = $request->input('source_id');
        if(!$source_id){
            return get_op_put(1,[],'缺少参数source_id');
        }
        $color_id = $request->input('color_id');
        if(!$color_id){
            return get_op_put(1,[],'缺少参数color_id');
        }
        $time = $request->input('time');
        if(!$time){
            return get_op_put(1,[],'缺少参数time');
        }
        $time = explode(',',$time);
        $user_id = user_id($key);  //获取用户id
        $type = DB::table('houses')->where('id',$house_id)->pluck('type_id');
        $type_id = $type[0]; //获取房型id
        $data = $request->input();
        $data['user_id'] = $user_id;
        $data['type_id'] = $type_id;
        $data['sta_time'] = $time[0];
        $data['com_time'] = $time[1];
        unset($data['key']);
        unset($data['time']);
        $add = DB::table('orders')->insert($data);
        if($add){
            if($status == "1"){
                $firstday = firstday($time[0]);
                $upperday = upperday($time[1]);
                $statistics = DB::table('statistics')->where('user_id',$user_id)->where('firstday',$firstday)->first();
                if(!$statistics){
                    $adds['user_id'] = $user_id;
                    $adds['firstday'] = $firstday;
                    $adds['thismonth_come'] = 1;

                    //得到上月入住数据
                    $upper = DB::table('statistics')->where('user_id',$user_id)->where('firstday',$upperday)->first();
                    if(!$upper){
                        $adds['lastmonth_come'] = 0;
                    }else{
                        $lastmonth_come = object_array($upper);
                        $adds['lastmonth_come'] = $lastmonth_come['thismonth_come'];
                    }

                    $adds['thismonth_revenue'] = $data['revenue'];
                    DB::table('statistics')->insert($adds);
                }else{
                    $statistics = object_array($statistics);
                    $save['thismonth_come'] = $statistics['thismonth_come']+1;
                    $save['thismonth_revenue'] = $data['revenue']+$statistics['thismonth_revenue'];
                    DB::table('statistics')->where('user_id',$user_id)->update($save);
                }
            }
            return get_op_put(0,[],'添加成功');
        }else{
            return get_op_put(2,[],'添加失败');
        }
    }

    /**
     * 添加房型
     *
     * @return \Illuminate\Http\Response
     */
    public function add_type(Request $request){
        $name = $request->input('name');
        if(!$name){
            return get_op_put(1,[],'缺少参数name');
        }
        $abbre = $request->input('abbre');
        if(!$abbre){
            return get_op_put(1,[],'缺少参数abbre');
        }
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }
        $num = $request->input('houses');

        $data = $request->input();
        $user_id = user_id($key);  //获取用户id
        $data['user_id'] = $user_id;
        unset($data['key']);
        unset($data['houses']);
        unset($data['keys']);
        $add = DB::table('types')->insertGetId($data);
        if($add){
            $hello = explode(',',$num);
            foreach($hello as $k=>$v){
                $arr['user_id'] = $user_id;
                $arr['type_id'] = $add;
                $arr['num'] = $v;
                DB::table('houses')->insertGetId($arr);
            }
            return get_op_put(0,[],'添加成功');
        }else{
            return get_op_put(2,[],'添加失败');
        }

    }

    /**
     * 添加来源
     *
     * @return \Illuminate\Http\Response
     */
    public function add_sources(Request $request){
        $source = $request->input('source');
        if(!$source){
            return get_op_put(1,[],'缺少参数source');
        }
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }else{
            $user_id = user_id($key);  //获取用户id
        }
        $add['user_id'] = $user_id;
        $add['source'] = $source;
        $addid = DB::table('sources')->insertGetId($add);
        if($addid){
            return get_op_put(0,[],'添加成功');
        }else{
            return get_op_put(2,[],'添加失败');
        }
    }
}
