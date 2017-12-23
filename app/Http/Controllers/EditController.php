<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    /**
     * 回显房间信息
     *
     * @return \Illuminate\Http\Response
     */
    public function houses(Request $request){
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
        $data = DB::table('houses')->where('id',$id)->where('user_id',$user_id)->first();
        if($data){
            $data = object_array($data);
            $channels = DB::table('channels')->where('house_id',$id)->get()->toArray();
            $data['channels'] = $channels;
            return get_op_put(0,$data,'请求成功');
        }
        return get_op_put(2,[],'无数据');
    }

    /**
     * 修改房间
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_houses(Request $request){
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
        $data = $request->input();
        $save['type_id'] = $data['type_id'];
        $save['num'] = $data['num'];
        $save['name'] = $data['name'];
        $save['address'] = $data['address'];
        DB::table('houses')->where('id',$id)->update($save);

        $channels = $request->input('channels');
        if($channels){
            DB::table('channels')->where('house_id',$id)->delete();
            $channels = explode(',',$channels);
            foreach($channels as $k=>$v){
                $add['house_id']=$id;
                $add['channel']=$v;
                DB::table('channels')->insert($add);
            }
        }
        return get_op_put(0,[],'请求成功');
    }

    /*
     * 编辑房型信息回显
     */
    public function type(Request $request){
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
        $data = DB::table('types')->where('id',$id)->where('user_id',$user_id)->first();
        if($data){
            $data = object_array($data);
            $houses = DB::table('houses')->where('type_id',$data['id'])->where('status',1)->where('user_id',$user_id)->get()->toArray();
            $houses = comb($houses);
            foreach($houses as $k=>$v){
                unset($houses[$k]['user_id']);
                unset($houses[$k]['type_id']);
                unset($houses[$k]['address']);
                unset($houses[$k]['status']);
            }
            $data['houses'] = $houses;
            return get_op_put(0,$data,'请求成功');
        }
        return get_op_put(2,[],'无数据');
    }

    /*
     * 编辑房型
     */
    public function edit_type(Request $request){
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
        $data = $request->input();
        unset($data['key']);
        unset($data['id']);
        unset($data['houses']);
        DB::table('types')->where('id',$id)->update($data);
        $houses = $request->input('houses');
        $houses = object_array(json_decode($houses));
        if($houses){
            foreach($houses as $k=>$v){
                if($v['id'] == "0"){
                    $arr['user_id'] = $user_id;
                    $arr['type_id'] = $id;
                    $arr['num'] = $v['num'];
                    DB::table('houses')->insertGetId($arr);
                }else{
                    DB::table('houses')->where('id',$v['id'])->update(array('num'=>$v['num']));
                }
            }
        }
        return get_op_put(0,[],'请求成功');
    }

    /*
     * 编辑订单信息回显
     */
    public function order(Request $request){
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
        $data = DB::table('orders')->where('id',$id)->where('user_id',$user_id)->first();
        if($data){
            return get_op_put(0,$data,'请求成功');
        }
        return get_op_put(2,[],'无数据');
    }

    /*
     * 编辑订单信息
     */
    public function edit_order(Request $request){
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
        $status = $request->input('status');
        if(!$status){
            return get_op_put(1,[],'缺少参数status');
        }
        if($status>2){
            return get_op_put(1,[],'参数status无效');
        }
        $source_id = $request->input('source_id');
        if(!$source_id){
            return get_op_put(1,[],'缺少参数source_id');
        }
        $color_id = $request->input('color_id');
        if(!$color_id){
            return get_op_put(1,[],'缺少参数color_id');
        }
        $sta_time = $request->input('sta_time');
        if(!$sta_time){
            return get_op_put(1,[],'缺少参数sta_time');
        }
        $com_time = $request->input('com_time');
        if(!$com_time){
            return get_op_put(1,[],'缺少参数com_time');
        }
        $data = $request->input();
        unset($data['key']);
        unset($data['id']);
        unset($data['type_id']);
        unset($data['house_id']);
        unset($data['user_id']);
        $das = DB::table('orders')->where('id',$id)->where('user_id',$user_id)->first();
        $das = object_array($das);
        if($das['status'] !== (int)$status){
            $firstday = firstday($das['sta_time']);
            $statistics = DB::table('statistics')->where('user_id',$user_id)->where('firstday',$firstday)->first();
            if($status>$das['status']){
                $statistics = object_array($statistics);
                $save['thismonth_come'] = $statistics['thismonth_come']-1;
                $save['thismonth_revenue'] = $statistics['thismonth_revenue']-$das['revenue'];
                DB::table('statistics')->where('user_id',$user_id)->where('firstday',$firstday)->update($save);
            }else{
                $statistics = object_array($statistics);
                $save['thismonth_come'] = $statistics['thismonth_come']+1;
                $save['thismonth_revenue'] = $data['revenue']+$statistics['thismonth_revenue'];
                DB::table('statistics')->where('user_id',$user_id)->where('firstday',firstday($sta_time))->update($save);
            }
        }
        DB::table('orders')->where('id',$id)->update($data);
        return get_op_put(0,[],'修改成功');
    }

    /*
     * 编辑来源的信息回显
     */
    public function sources(Request $request){
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
        $data = DB::table('sources')->where('id',$id)->where('user_id',$user_id)->first();
        if($data){
            return get_op_put(0,$data,'请求成功');
        }
        return get_op_put(2,[],'无数据');
    }

    /*
     * 编辑来源
     */
    public function edit_sources(Request $request){
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
        $source = $request->input('source');
        if(!$source){
            return get_op_put(1,[],'缺少参数source');
        }
        $data = $request->input();
        $save['source'] = $data['source'];
        DB::table('sources')->where('id',$id)->update($save);
        return get_op_put(0,[],'修改成功');
    }

}
