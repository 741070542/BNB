<?php
/*
 * 省市区控制器
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * 省列表
     *
     * @return \Illuminate\Http\Response
     */
    public function province(Request $request)
    {
        $data = DB::table('city')->where('pid',1)->get()->toArray();
        if($data){
            return get_op_put(0,$data,'请求成功');
        }else{
            return get_op_put(2,[],'请求失败');
        }
    }
    /**
     * 市列表
     *
     * @return \Illuminate\Http\Response
     */
    public function city(Request $request)
    {
        $id = $request->input('id');
        if(!$id){
            return get_op_put(1,[],'缺少父级id');
        }
        $data = DB::table('city')->where('pid',$id)->get()->toArray();
        if($data){
            return get_op_put(0,$data,'请求成功');
        }else{
            return get_op_put(2,[],'请求失败');
        }
    }
    /**
     * 区县列表
     *
     * @return \Illuminate\Http\Response
     */
    public function county(Request $request)
    {
        $id = $request->input('id');
        if(!$id){
            return get_op_put(1,[],'缺少父级id');
        }
        $data = DB::table('city')->where('pid',$id)->get()->toArray();
        if($data){
            return get_op_put(0,$data,'请求成功');
        }else{
            return get_op_put(2,[],'请求失败');
        }
    }
}
