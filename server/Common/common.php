<?php
/**
 * 
 * 取得图片上传目录
 */
function getUploadPath(){
	
	return APP_PATH.'/images/';
	
}

/**
 * 
 * 取得页面显示图片目录
 */
function getShowPath(){
	
	return __APP__.'/images/';
	
}

/**
 * 
 * 过滤字符串里面的特殊字符
 * @param $content
 */
function filterSpecial($content){
	
	$content = strip_tags($content);
    $search = array ("'<script[^>]*?>.*?</script>'si", "'([\r\n])'", "'(\')'");                     
    $replace = array ("", "", "’");
    
    return preg_replace($search, $replace, $content);
    
}

/**
 * 返回汉字长度1汉字=2
 * @param $str
 */
function str_len($str){
	
    $length = strlen(preg_replace('/[\x00-\x7F]/', '', $str));
    if ($length) {
        return strlen($str) - $length + intval($length / 3) * 2;
    } else {
        return strlen($str);
    }
}

/**
 * 
 * 取得用户id
 */
function getUid(){
	$name = Session::get(C('SESSION_AUTH_KEY'));
	if($name){
		$u=M('User');
		$rsinfo=$u->where("name='".$name."'")->find();
		if($rsinfo){
			return $rsinfo['id'];
		}else{
			return '0';	
		}
	}
}