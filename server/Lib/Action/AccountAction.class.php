<?php
/**
 * @Date 2012.3.16
 * @File: AccountAction.class.php
 * @Author Leyteris
 */
class AccountAction extends Action {
	
	/**
	 * 
	 * 初始化
	 */
	function _initialize(){
		
		header("Content-Type:application/json; charset=utf-8");
		
    }
    
    /**
     * 
     * 登录接口
     */
	public function login(){
		
		load('extend');
		
		$name = filterSpecial(H($_REQUEST['name']));
		$password = filterSpecial(H($_REQUEST['password']));
		$rememberMe = filterSpecial(H($_REQUEST['rememberMe']));
		
		if(empty($name)||empty($password)){
			$this -> ajaxReturn(null,'所有信息必须输入',0,'json');
		}
		
        $loginOk = false;
        
		$user = M('User');
		
		$data = array();
		$data['name'] = $name;
		$data['password'] = md5($password);
		
		$rs = $user -> field(array('id', 'nickname', 'name', 'create_time'))
			-> where($data) 
			-> find();
		if($rs){	
            $loginOk = true;
		}else{
			$this -> ajaxReturn(null,'密码或用户名错误',0,'json');
        }
        
        if($loginOk){
			if($rememberMe){
				Cookie::set(C('COOKIE_USER_NAME'),$rs['name'],60*60*24*7);
				Cookie::set(C('COOKIE_USER_ID'),$rs['id'],60*60*24*7);
			}
			Session::set(C('SESSION_AUTH_KEY'),$name);
			
			$this -> ajaxReturn($rs,'登录成功',1,'json');
        }else{
        	$this -> ajaxReturn(null,'登录失败',0,'json');
        }
        
	}
	
	/**
	 * 
	 * 注销接口
	 */
	public function logout(){
		
		Session::set(C('SESSION_AUTH_KEY'),null);
		Session::destroy();
		
		Cookie::delete(C('COOKIE_USER_NAME'));
		Cookie::delete(C('COOKIE_USER_ID'));
		
		$this -> ajaxReturn(null,'注销成功',1,'json');
		
	}
	
	/**
	 * 
	 * 用户注册接口
	 */
	public function register(){
		
		load('extend');

		$name = filterSpecial(H($_REQUEST['name']));
		$password = filterSpecial(H($_REQUEST['password']));
		$rePassword = filterSpecial(H($_REQUEST['rePassword']));
		$nickname = filterSpecial(H($_REQUEST['nickname']));
		
		if(empty($name) || empty($password)){
			$this -> ajaxReturn(null,'所有信息必须输入',0,'json');
		}

		if((str_len($name) < 5) || (str_len($name) > 20)){
			$this -> ajaxReturn(null,'用户名长度错误，长度必须是5-20位',0,'json');
		}
		
		if(!preg_match("/^[0-9a-zA-Z]{6,16}$/",$password)){
			$this -> ajaxReturn(null,'密码不能含有特殊字符，长度必须是6-16位',0,'json');
		}
		
		if($password != $rePassword){
			$this -> ajaxReturn(null,'两次输入的密码必须一致',0,'json');
		}

		$user = M('User');
		
		$cdata = array();
		$cdata['name'] = $name;
		if($user -> where($cdata) -> find()){
			$this -> ajaxReturn(null,'该用户名已经存在,请更换一个',0,'json');
		}

        
		$arr = array();
		$arr['name'] = $name;
		$arr['nickname'] = $nickname;
		$arr['password'] = md5($password);
		$arr['create_time'] = time();
		$arr['create_ip'] = get_client_ip();
		
		if($user -> add($arr)){
			Session::set(C('SESSION_AUTH_KEY'),$name);
			unset($arr['password']);
			unset($arr['create_ip']);
			$this -> ajaxReturn($arr,'恭喜您注册成功',1,'json');
		}
		else{
			$this -> ajaxReturn(null,'注册失败',0,'json');
		}
	}
}