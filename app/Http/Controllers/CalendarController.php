<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    /**
     * 日历列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index_housing(Request $request)
    {
        $sta_time = $request->input('sta_time');
        if(!$sta_time){
            return get_op_put(1,[],'缺少参数sta_time');
        }
        date_default_timezone_set("Asia/Shanghai");
        $sta_time = strtotime(date('Y-m-d 00:00:00', $sta_time));
        $com_time = $sta_time+50*24*60*60-1;
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }else{
            $user_id = user_id($key);  //用户id
        }
        $type_id = $request->input('type_id');
        if($type_id){
            $hello = explode(',',$type_id);
            foreach($hello as $k=>$v){
                $hello[$k] = (int)$v;
            }
            $data = DB::table('orders')
                ->whereIn('type_id',$hello)
                ->where('user_id',$user_id)
                ->where('status','<',3)
                ->whereBetween('sta_time', array((int)$sta_time, (int)$com_time))
                ->get()
                ->toArray();
        }else{
            $data = DB::table('orders')
                ->where('user_id',$user_id)
                ->where('status','<',3)
                ->whereBetween('sta_time', array((int)$sta_time, (int)$com_time))
                ->get()
                ->toArray();
        }
        if(count($data)){
            $data = comb($data);
            foreach($data as $k=>$v){
                $data[$k]['dates'] = ceil(($v['com_time'] - $v['sta_time'])/60/60/24);
            }

            $res = array();
            foreach ($data as $k => $v) {
                $res[$v['house_id']][] = $v;
            }
            return get_op_put(0,$res,'请求成功');
        }else{
            return get_op_put(2,$data,'暂无数据');
        }
    }

    /**
     * 户型列表
     * @return \Illuminate\Http\Response
     */
    public function index_type(Request $request)
    {
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }else{
            $user_id = user_id($key);  //用户id
            $data = DB::table('types')
                ->where('user_id',$user_id)
                ->where('status',1)
                ->get()
                ->toArray();
        }
        if(count($data)){
            $data = comb($data);
            foreach($data as $k=>$v){
                $data[$k]['num'] = DB::table('houses')->where('type_id',$v['id'])->count();
                $data[$k]['houses'] = '';
                $houses = DB::table('houses')->where('status',1)->where('type_id',$v['id'])->get()->toArray();
                if(count($houses)){
                    $houses = comb($houses);
                    foreach($houses as $k2=>$v2){
                        $data[$k]['houses'] .= $v2['num'].' | ';
                    }
                    $data[$k]['houses'] = substr($data[$k]['houses'],0,strlen($data[$k]['houses'])-2);
                }
            }
            return get_op_put(0,$data,'请求成功');
        }else{
            return get_op_put(2,$data,'暂无数据');
        }
    }

    /**
     * 房间列表
     * @return \Illuminate\Http\Response
     */
    public function index_houses(Request $request)
    {
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }
        $user_id = user_id($key);  //用户id
        $id = $request->input('id');
        if(!$id) {
            $data = DB::table('houses')
                ->join('types', 'houses.type_id', '=', 'types.id')
                ->select('houses.*', 'types.name as tname', 'types.abbre')
                ->where('houses.user_id', $user_id)
                ->where('houses.status', 1)
                ->get()
                ->toArray();
        }else{
            $hello = explode(',',$id);
            foreach($hello as $k=>$v){
                $hello[$k] = (int)$v;
            }
            $data = DB::table('houses')
                ->join('types', 'houses.type_id', '=', 'types.id')
                ->select('houses.*', 'types.name as tname', 'types.abbre')
                ->where('houses.user_id', $user_id)
                ->where('houses.status', 1)
                ->whereIn('houses.type_id',$hello)
                ->get()
                ->toArray();
        }
        if(count($data)){
            $data = comb($data);
            return get_op_put(0,$data,'请求成功');
        }else{
            return get_op_put(2,$data,'暂无数据');
        }
    }

    /**
     * 来源列表
     * @return \Illuminate\Http\Response
     */
    public function index_sources(Request $request){
        $key = $request->input('key');
        if(!$key){
            return get_op_put(1,[],'缺少参数key');
        }else{
            $user_id = user_id($key);
        }
        $data = DB::table('sources')->where('user_id', $user_id)->get()->toArray();
        if(count($data)){
            $data = comb($data);
            return get_op_put(0,$data,'请求成功');
        }else{
            return get_op_put(2,$data,'暂无数据');
        }
    }
}
