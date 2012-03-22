<?php
/**
 * @Date 2012.3.16
 * @File: BaseAction.class.php
 * @Author Leyteris
 */
class BaseAction extends Action
{
	/**
	 * 
	 * 初始化
	 */
	function _initialize(){
		
		header("Content-Type:application/json; charset=utf-8");
		$this -> autoLogin();
		
    }
    
    public function index() {
    	$this -> isLogin();
    	$this -> ajaxReturn(null, '嗯哼，你的确登陆了', 1, 'json');
    }
    
    /**
     * 
     * 检查是否登录
     */
	protected function isLogin(){
		
		if(!Session::is_set(C('SESSION_AUTH_KEY'))) {
			$this -> ajaxReturn(null, '你还没有登陆', 0, 'json');
		}
		
	}
	
	/**
	 * 
	 * 根据cookie自动登录
	 */
	protected function autoLogin(){
		
		if(Session::is_set(C('SESSION_AUTH_KEY'))) {
			return;
		}
		
		$name = $id = null;
		
		if(Cookie::is_set(C('COOKIE_USER_NAME'))) {
			$name = Cookie::get(C('COOKIE_USER_NAME'));
		}
		if(Cookie::is_set(C('COOKIE_USER_ID'))) {
			$id = Cookie::get(C('COOKIE_USER_ID'));
		}
		if($name && $id){
			
			$user = M('User');
			
			$data = array();
			$data['name'] = $name;
			$data['id'] = $id;
			
			$rs = $user -> where($data) 
				-> find();
				
			if($rs) {	
	            Session::set(C('SESSION_AUTH_KEY'), $name);
			} else {
				$this -> ajaxReturn(null, '你还没有登陆', 0, 'json');
			}
			
		}
		
	}
	

}