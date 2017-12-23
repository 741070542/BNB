<?php

/**
 * 输出json
 * @param type $status
 * @param type $data
 * @param type $int
 */
function get_op_put($status, $data, $int) {
    $array = array(
        "status" => $status,
        "data" => $data,
        "interpret" => $int
    );
    echo json_encode($array);
    exit;
}

/**
 * 输出数组
 * @param type $status
 * @param type $data
 * @param type $url
 */
function get_op_res($status, $data, $url = null) {
    $array = array(
        "status" => $status,
        "msg" => $data,
        "data" => $url
    );
    return $array;
}

/**
 * CURL扩展方法
 * @param type $url
 * @param type $params
 * @return type
 */
function poCurl($url, $params) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

########################私有方法####################

/*
 * XML文件转换为数组
 */
function xmlToArray($xml)
{
    //禁止引用外部xml实体
    libxml_disable_entity_loader(true);
    $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    return $values;
}

/**
 *   实现中文字串截取无乱码的方法
 */
function getSubstr($string, $start, $length) {
    if(mb_strlen($string,'utf-8')>$length){
        $str = mb_substr($string, $start, $length,'utf-8');
        return $str.'...';
    }else{
        return $string;
    }
}

/*
 * 对象转数组
 */
function object_array($array) {
    if(is_object($array)) {
        $array = (array)$array;
    } if(is_array($array)) {
        foreach($array as $key=>$value) {
            $array[$key] = object_array($value);
        }
    }
    return $array;
}
/*
 * 处理查询的数据
 */
function comb($data){
    foreach($data as $k=>$v){
        $sellers[$k]=(array)$v;
    }
    return $sellers;
}

/*
 * 获得user_id
 */
function user_id($key){
    $data = DB::table('users')->where('key',$key)->pluck('id')->toArray();
    if($data){
        return $data[0];
    }else{
        get_op_put(3,[],'用户不存在');
    }
}

/*
 * 获取时间戳中的月份的起始时间
 */
function firstday($time){
    date_default_timezone_set("Asia/Shanghai");
    $firstday = strtotime(date('Y-m-01 00:00:00', $time));
    return $firstday;
}

/*
 * 获取时间戳中上月的起始时间
 */
function upperday($time)
{
    //得到系统的年月
    $tmp_date=date("Ym",$time);
    //切割出年份
    $tmp_year=substr($tmp_date,0,4);
    //切割出月份
    $tmp_mon =substr($tmp_date,4,2);
    $tmp_nextmonth=mktime(0,0,0,$tmp_mon+1,1,$tmp_year);
    $tmp_forwardmonth=mktime(0,0,0,$tmp_mon-1,1,$tmp_year);
    //得到当前月的上一个月
    return $fm_forward_month=strtotime(date("Y-m-01",$tmp_forwardmonth));
}

/******************************云片*****************************/
//获得账户
function get_user($ch,$apikey){
    curl_setopt ($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/user/get.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('apikey' => $apikey)));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    checkErr($result,$error);
    return $result;
}
function send($ch,$data){
    curl_setopt ($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/sms/single_send.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    checkErr($result,$error);
    return $result;
}
function tpl_send($ch,$data){
    curl_setopt ($ch, CURLOPT_URL,
        'https://sms.yunpian.com/v2/sms/tpl_single_send.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    checkErr($result,$error);
    return $result;
}
function voice_send($ch,$data){
    curl_setopt ($ch, CURLOPT_URL, 'http://voice.yunpian.com/v2/voice/send.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    checkErr($result,$error);
    return $result;
}
function notify_send($ch,$data){
    curl_setopt ($ch, CURLOPT_URL, 'https://voice.yunpian.com/v2/voice/tpl_notify.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    checkErr($result,$error);
    return $result;
}

function checkErr($result,$error) {
    if($result === false)
    {
        echo 'Curl error: ' . $error;
    }
}

function send_out($code,$phone){
    //用户输入验证码正确
    header("Content-Type:text/html;charset=utf-8");
    $apikey = getenv('YUN_APIKEY'); //修改为您的apikey(https://www.yunpian.com)登录官网后获取
    $mobile = $phone; //手机号
    $text="【教练好APP】您的验证码是".$code;
    $ch = curl_init();
    /* 设置验证方式 */
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8',
        'Content-Type:application/x-www-form-urlencoded', 'charset=utf-8'));
    /* 设置返回结果为流 */
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    /* 设置超时时间*/
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    /* 设置通信方式 */
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // 发送短信
    $data=array('text'=>$text,'apikey'=>$apikey,'mobile'=>$mobile);
    $json_data = send($ch,$data);
    $array = json_decode($json_data,true);
    return $array;
}

