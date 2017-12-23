<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogoController extends Controller{

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
        $token = $user->createToken('Bearer')->accessToken;
        $data = object_array($data);
        $data['token'] = $token;
        if($data){
            return get_op_put(0,$data,'登录成功');
        }
        return get_op_put(2,[],'帐号或密码错误');
    }

    public function reg(Request $request){

    }

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
        DB::table('reg')->where('phone', $phone)->delete();
        DB::table('reg')->insertGetId($add);
        //生成图片
        CaptchaBuilder::create();
        return response($builder->output())->header('Content-type','image/jpeg');
    }

    public function wer_add(){
        $code = request('code');
        if(!$code){
            return get_op_put(1, [], '未输入验证码！');
        }
        $phone = request('phone');
        if(!$phone){
            return get_op_put(1, [], '缺少参数phone！');
        }
        $data = DB::table('reg')->where('phone', $phone)->where('code', $code)->get()->toArray();
        if ($data) {
            $code = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $sent = send_out($code,$phone); //发送验证码
            var_dump($sent);exit;
            return get_op_put(0, [], '验证码正确！');
        } else {
            //用户输入验证码错误
            return get_op_put(2, [], '验证码输入错误！');
        }
    }
}
