<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaController extends Controller
{
    /**
     * 统计
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics(Request $request)
    {
        $key = $request->input('key');
        if (!$key) {
            return get_op_put(1, [], '缺少参数key');
        } else {
            $user_id = user_id($key);  //用户id
        }
        date_default_timezone_set("Asia/Shanghai");
        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
        $today_stay = DB::table('orders')//今日入住
        ->where('user_id', $user_id)
            ->where('status', 1)
            ->whereBetween('sta_time', array($beginToday, $endToday))
            ->count();
        $tomorrow_stay = DB::table('orders')//明日入住
        ->where('user_id', $user_id)
            ->where('status', 1)
            ->whereBetween('sta_time', array($beginToday + 24 * 60 * 60, $endToday + 24 * 60 * 60))
            ->count();
        $today_go = DB::table('orders')//今日退房
        ->where('user_id', $user_id)
            ->where('status', 1)
            ->whereBetween('com_time', array($beginToday, $endToday))
            ->count();
        $tomorrow_go = DB::table('orders')//明日退房
        ->where('user_id', $user_id)
            ->where('status', 1)
            ->whereBetween('com_time', array($beginToday + 24 * 60 * 60, $endToday + 24 * 60 * 60))
            ->count();
        $time = firstday(time());
        $statistics = DB::table('statistics')->where('firstday', $time)->first();
        $statistics = object_array($statistics);
        if (!$statistics) {
            $data[0]['content'] = $today_stay;
            $data[0]['title'] = "今日入住";
            $data[0]['status'] = 1;

            $data[1]['content'] = $tomorrow_stay;
            $data[1]['title'] = "明日入住";
            $data[1]['status'] = 1;

            $data[2]['content'] = $today_go;
            $data[2]['title'] = "今日退房";
            $data[2]['status'] = 1;

            $data[3]['content'] = $tomorrow_go;
            $data[3]['title'] = "明日退房";
            $data[3]['status'] = 1;

            $data[4]['content'] = 0;
            $data[4]['title'] = "本月入住";
            $data[4]['status'] = 2;

            $data[5]['content'] = 0;
            $data[5]['title'] = "上月入住";
            $data[5]['status'] = 2;

            $data[6]['content'] = 0;
            $data[6]['title'] = "本月收入";
            $data[6]['status'] = 2;

        } else {
            $data[0]['content'] = $today_stay;
            $data[0]['title'] = "今日入住";
            $data[0]['status'] = 1;

            $data[1]['content'] = $tomorrow_stay;
            $data[1]['title'] = "明日入住";
            $data[1]['status'] = 1;

            $data[2]['content'] = $today_go;
            $data[2]['title'] = "今日退房";
            $data[2]['status'] = 1;

            $data[3]['content'] = $tomorrow_go;
            $data[3]['title'] = "明日退房";
            $data[3]['status'] = 1;

            $data[4]['content'] = $statistics['thismonth_come'];
            $data[4]['title'] = "本月入住";
            $data[4]['status'] = 2;

            $data[5]['content'] = $statistics['thismonth_come'];
            $data[5]['title'] = "上月入住";
            $data[5]['status'] = 2;

            $data[6]['content'] = $statistics['thismonth_come'];
            $data[6]['title'] = "本月收入";
            $data[6]['status'] = 2;
        }
        return get_op_put(0, $data, '获取成功');
    }

    /*
     * 订单列表
     */
    public function order(Request $request)
    {
        $key = $request->input('key');
        if (!$key) {
            return get_op_put(1, [], '缺少参数key');
        } else {
            $user_id = user_id($key);  //用户id
        }
        $status = $request->input('status');
        if(!$status){
            return get_op_put(1,[],'缺少参数status');
        }

        $start_time = $request->input('start_time'); //查询开始时间
        $end_time = $request->input('end_time'); //查询结束时间
        if($start_time){
            if(!$end_time){
                return get_op_put(1,[],'时间参数不完整');
            }
        }
        if($end_time){
            if(!$start_time){
                return get_op_put(1,[],'时间参数不完整');
            }
        }
        $content = $request->input('content'); //查询内容
        date_default_timezone_set("Asia/Shanghai");
        if($status == 1){
            if($content){
                $sta_time = strtotime(date('Y-m-d 00:00:00', time()));
                $com_time = $sta_time + 24*60*60-1;
                $data = DB::table('orders')
                    ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                    ->join('sources', 'sources.id', '=', 'orders.source_id')
                    ->join('houses','orders.house_id','=','houses.id')
                    ->join('colors', 'colors.id', '=', 'orders.color_id')
                    ->where('orders.status',1)
                    ->whereBetween('orders.sta_time', array($sta_time,$com_time))
                    ->Where(function ($query) use($content){
                        $query->orwhere('orders.name', 'LIKE', "%$content%")
                            ->orwhere('orders.phone', 'LIKE', "%$content%")
                            ->orwhere('houses.num', 'LIKE', "%$content%");
                    })
                    ->paginate(1);
            }else{
                $sta_time = strtotime(date('Y-m-d 00:00:00', time()));
                $com_time = $sta_time + 24*60*60-1;
                $data = DB::table('orders')
                    ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                    ->join('sources', 'sources.id', '=', 'orders.source_id')
                    ->join('houses','orders.house_id','=','houses.id')
                    ->join('colors', 'colors.id', '=', 'orders.color_id')
                    ->where('orders.status',1)
                    ->whereBetween('orders.sta_time', array($sta_time,$com_time))
                    ->paginate(1);
            }
        }
        if($status == 2){
            if($content){
                $sta_time = strtotime(date('Y-m-d 00:00:00', time()))+24*60*60;
                $com_time = $sta_time+24*60*60-1;
                $data = DB::table('orders')
                    ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                    ->join('sources', 'sources.id', '=', 'orders.source_id')
                    ->join('houses','orders.house_id','=','houses.id')
                    ->join('colors', 'colors.id', '=', 'orders.color_id')
                    ->where('orders.status',1)
                    ->whereBetween('orders.sta_time', array($sta_time,$com_time))
                    ->Where(function ($query) use($content){
                        $query->orwhere('orders.name', 'LIKE', "%$content%")
                            ->orwhere('orders.phone', 'LIKE', "%$content%")
                            ->orwhere('houses.num', 'LIKE', "%$content%");
                    })
                    ->paginate(1);
            }else{
                $sta_time = strtotime(date('Y-m-d 00:00:00', time()))+24*60*60;
                $com_time = $sta_time+24*60*60-1;
                $data = DB::table('orders')
                    ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                    ->join('sources', 'sources.id', '=', 'orders.source_id')
                    ->join('houses','orders.house_id','=','houses.id')
                    ->join('colors', 'colors.id', '=', 'orders.color_id')
                    ->where('orders.status',1)
                    ->whereBetween('orders.sta_time', array($sta_time,$com_time))
                    ->paginate(1);
            }
        }
        if($status == 3){
            if($content){
                $sta_time = strtotime(date('Y-m-d 00:00:00', time()))+24*60*60;
                $com_time = $sta_time+24*60*60-1;
                $data = DB::table('orders')
                    ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                    ->join('sources', 'sources.id', '=', 'orders.source_id')
                    ->join('houses','orders.house_id','=','houses.id')
                    ->join('colors', 'colors.id', '=', 'orders.color_id')
                    ->where('orders.status',1)
                    ->whereBetween('orders.com_time', array($sta_time,$com_time))
                    ->Where(function ($query) use($content){
                        $query->orwhere('orders.name', 'LIKE', "%$content%")
                            ->orwhere('orders.phone', 'LIKE', "%$content%")
                            ->orwhere('houses.num', 'LIKE', "%$content%");
                    })
                    ->paginate(1);
            }else{
                $sta_time = strtotime(date('Y-m-d 00:00:00', time()))+24*60*60;
                $com_time = $sta_time+24*60*60-1;
                $data = DB::table('orders')
                    ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                    ->join('sources', 'sources.id', '=', 'orders.source_id')
                    ->join('houses','orders.house_id','=','houses.id')
                    ->join('colors', 'colors.id', '=', 'orders.color_id')
                    ->where('orders.status',1)
                    ->whereBetween('orders.com_time', array($sta_time,$com_time))
                    ->paginate(1);
            }
        }
        if($status == 4){
            if($content){
                $sta_time = strtotime(date('Y-m-d 00:00:00', time()))+24*60*60;
                $com_time = $sta_time+24*60*60-1;
                $data = DB::table('orders')
                    ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                    ->join('sources', 'sources.id', '=', 'orders.source_id')
                    ->join('houses','orders.house_id','=','houses.id')
                    ->join('colors', 'colors.id', '=', 'orders.color_id')
                    ->where('orders.status',1)
                    ->whereBetween('orders.com_time', array($sta_time,$com_time))
                    ->Where(function ($query) use($content){
                        $query->orwhere('orders.name', 'LIKE', "%$content%")
                            ->orwhere('orders.phone', 'LIKE', "%$content%")
                            ->orwhere('houses.num', 'LIKE', "%$content%");
                    })
                    ->paginate(1);
            }else{
                $sta_time = strtotime(date('Y-m-d 00:00:00', time()))+24*60*60;
                $com_time = $sta_time+24*60*60-1;
                $data = DB::table('orders')
                    ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                    ->join('sources', 'sources.id', '=', 'orders.source_id')
                    ->join('houses','orders.house_id','=','houses.id')
                    ->join('colors', 'colors.id', '=', 'orders.color_id')
                    ->where('orders.status',1)
                    ->whereBetween('orders.com_time', array($sta_time,$com_time))
                    ->paginate(1);
            }
        }
        if($status == 5){
            if($content){
                if($start_time){
                    $data = DB::table('orders')
                        ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                        ->join('sources', 'sources.id', '=', 'orders.source_id')
                        ->join('houses','orders.house_id','=','houses.id')
                        ->join('colors', 'colors.id', '=', 'orders.color_id')
                        ->where('orders.status',1)
                        ->whereBetween('orders.sta_time', array($start_time,$end_time))
                        ->Where(function ($query) use($content){
                            $query->orwhere('orders.name', 'LIKE', "%$content%")
                                ->orwhere('orders.phone', 'LIKE', "%$content%")
                                ->orwhere('houses.num', 'LIKE', "%$content%");
                        })
                        ->paginate(1);
                }else{
                    $data = DB::table('orders')
                        ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                        ->join('sources', 'sources.id', '=', 'orders.source_id')
                        ->join('houses','orders.house_id','=','houses.id')
                        ->join('colors', 'colors.id', '=', 'orders.color_id')
                        ->where('orders.status',1)
                        ->Where(function ($query) use($content){
                                $query->orwhere('orders.name', 'LIKE', "%$content%")
                                  ->orwhere('orders.phone', 'LIKE', "%$content%")
                                  ->orwhere('houses.num', 'LIKE', "%$content%");
                        })
                        ->paginate(1);
                }

            }else{
                if($start_time){
                    $data = DB::table('orders')
                        ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                        ->join('sources', 'sources.id', '=', 'orders.source_id')
                        ->join('houses','orders.house_id','=','houses.id')
                        ->join('colors', 'colors.id', '=', 'orders.color_id')
                        ->where('orders.status',1)
                        ->whereBetween('orders.sta_time', array($start_time,$end_time))
                        ->paginate(1);
                }else{
                    if(!$start_time){
                        $data = DB::table('orders')
                            ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                            ->join('sources', 'sources.id', '=', 'orders.source_id')
                            ->join('houses','orders.house_id','=','houses.id')
                            ->join('colors', 'colors.id', '=', 'orders.color_id')
                            ->where('orders.status',1)
                            ->paginate(1);
                    }
                }
            }
        }
        if($status == 6){
            if($content){
                if($start_time){
                    $data = DB::table('orders')
                        ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                        ->join('sources', 'sources.id', '=', 'orders.source_id')
                        ->join('houses','orders.house_id','=','houses.id')
                        ->join('colors', 'colors.id', '=', 'orders.color_id')
                        ->where('orders.status','>',2)
                        ->whereBetween('orders.sta_time', array($start_time,$end_time))
                        ->Where(function ($query) use($content){
                            $query->orwhere('orders.name', 'LIKE', "%$content%")
                                ->orwhere('orders.phone', 'LIKE', "%$content%")
                                ->orwhere('houses.num', 'LIKE', "%$content%");
                        })
                        ->paginate(1);
                }else{
                    $data = DB::table('orders')
                        ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                        ->join('sources', 'sources.id', '=', 'orders.source_id')
                        ->join('houses','orders.house_id','=','houses.id')
                        ->join('colors', 'colors.id', '=', 'orders.color_id')
                        ->where('orders.status','>',2)
                        ->Where(function ($query) use($content){
                            $query->orwhere('orders.name', 'LIKE', "%$content%")
                                ->orwhere('orders.phone', 'LIKE', "%$content%")
                                ->orwhere('houses.num', 'LIKE', "%$content%");
                        })
                        ->paginate(1);
                }

            }else{
                if($start_time){
                    $data = DB::table('orders')
                        ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                        ->join('sources', 'sources.id', '=', 'orders.source_id')
                        ->join('houses','orders.house_id','=','houses.id')
                        ->join('colors', 'colors.id', '=', 'orders.color_id')
                        ->where('orders.status','>',2)
                        ->whereBetween('orders.sta_time', array($start_time,$end_time))
                        ->paginate(1);
                }else{
                    if(!$start_time){
                        $data = DB::table('orders')
                            ->select('orders.*', 'houses.num', 'sources.source as source_name', 'colors.state', 'colors.remark as colors_remark')
                            ->join('sources', 'sources.id', '=', 'orders.source_id')
                            ->join('houses','orders.house_id','=','houses.id')
                            ->join('colors', 'colors.id', '=', 'orders.color_id')
                            ->where('orders.status','>',2)
                            ->paginate(1);
                    }
                }
            }
        }
        if(count($data)){
            $total = $data->total();
            $currentpage = $data->currentpage();
            $data = comb($data);
            $arr['total'] = $total;
            $arr['currentpage'] = $currentpage;
            $arr['data'] = $data;
            return get_op_put(0,$arr,'请求成功');
        }else{
            return get_op_put(2,[],'暂无数据');
        }
    }
}
