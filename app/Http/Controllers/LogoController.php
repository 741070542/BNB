<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogoController extends Controller{

    /*
     * 登陆
     */
    public function logo(Request $request){
        $phone = $request->input('phone');
        if(!$phone) {
            return get_op_put(1, [], '缺少参数phone');
        }
        $password = $request->input('password');
        if(!$password) {
            return get_op_put(1, [], '缺少参数password');
        }else{
            $password = md5($password."AFD/S|G^H`L/O");
        }
        $data = DB::table('users')->where('phone',$phone)->where('password',$password)->first();
        $user = new \App\Models\User();
        $token = $user->createToken('Token Name')->accessToken;
        $data = object_array($data);
        $data['token'] = $token;
        if($data){
            return get_op_put(0,$data,'登录成功');
        }
        return get_op_put(2,[],'帐号或密码错误');
    }

    /*
     * 图片验证码
     */
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性CaptchaBuilder
        $builder = new CaptchaBuilder();
        //可以设置图片宽高及字体
        $builder->build($width = 150, $height = 40);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入数据库
        $phone = request('phone');
        if(!$phone){
            return get_op_put(1, [], '缺少参数phone');
            exit;
        }
        $add['phone'] = $phone;
        $add['code'] = $phrase;
        $add['img_time'] = time()+60;
        DB::table('reg')->where('phone', $phone)->delete();
        DB::table('reg')->insertGetId($add);
        //生成图片
        CaptchaBuilder::create();
        return response($builder->output())->header('Content-type','image/jpeg');
    }

    /*
     * 验证图片验证码并发送短信
     */
    public function wer_add(){
        $code = request('code');
        if(!$code){
            return get_op_put(1, [], '未输入验证码！');
        }
        $phone = request('phone');
        if(!$phone){
            return get_op_put(1, [], '缺少参数phone！');
        }
        $data = DB::table('reg')->where('phone', $phone)->where('code', $code)->first();
        if ($data) {
            $data = object_array($data);
            $time = time() - $data['img_time'];
            if($time>0){
                return get_op_put(2, [], '验证码过期！');
            }
            $phone_code = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $phone_time = time()+60;
            DB::table('reg')->where('phone', $phone)->update(array('phone_code'=>$phone_code,'phone_time'=>$phone_time));
            $sent = send_out($phone_code,$phone); //发送验证码
            if($sent['code'] == 0){
                return get_op_put(0, [], '验证码发送成功！');
            }else{
                return get_op_put(0, [], '验证码发送失败！');
            }
            return get_op_put(0, [], '验证码发送成功！');
        } else {
            //用户输入验证码错误
            return get_op_put(2, [], '验证码输入错误！');
        }
    }

    /*
     * 注册
     */
    public function registration(Request $request){

        $phone_code = $request->input('phone_code');
        if(!$phone_code){
            return get_op_put(1, [], '缺少参数phone_code！');
        }
        $add['phone'] = $request->input('phone');
        if(!$add['phone']){
            return get_op_put(1, [], '缺少参数phone！');
        }
        $reg = DB::table('reg')->where('phone',$add['phone'])->where('phone_code',$phone_code)->first();
        if(!$reg){
            return get_op_put(2, [], '验证码错误！');
        }else{
            $reg = object_array($reg);
            $time = time() - $reg['phone_time'];
            if($time>0){
                return get_op_put(2, [], '验证码过期！');
            }
        }
        $add['name'] = $request->input('name');
        if(!$add['name']){
            return get_op_put(1, [], '缺少参数name！');
        }
        $add['password'] = $request->input('password');
        if(!$add['password']){
            return get_op_put(1, [], '缺少参数password！');
        }else{
            $add['password'] = md5($add['password']."AFD/S|G^H`L/O");
        }
        $add['province_id'] = $request->input('province_id');
        if(!$add['province_id']){
            return get_op_put(1, [], '缺少参数province_id！');
        }
        $add['city_id'] = $request->input('city_id');
        if(!$add['city_id']){
            return get_op_put(1, [], '缺少参数city_id！');
        }
        $add['county_id'] = $request->input('county_id');
        if(!$add['county_id']){
            return get_op_put(1, [], '缺少参数county_id！');
        }
        $data = DB::table('users')->where('phone',$add['phone'])->first();
        if($data){
            return get_op_put(2, [], '该手机已被注册！');
        }else{
            $add['key'] = str_random(60);
            $add['addtime'] = time();
            $id = DB::table('users')->insertGetId($add);
            if($id){
                return get_op_put(0,$add,'注册成功');
            }else{
                return get_op_put(2, [], '注册失败！');
            }
        }

    }
}
