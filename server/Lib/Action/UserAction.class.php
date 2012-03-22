<?php
/**
 * @Date 2012.3.12
 * @File: UserAction.class.php
 * @Author Leyteris
 */
class UserAction extends BaseAction
{

	/**
	 * 
	 * 获取用户信息
	 */
	public function pull(){
		
		$this -> isLogin();
		
		$uid = $_REQUEST['uid'];

		$user = M('User');
		
		$list = $user -> field(array('id', 'nickname', 'name', 'create_time'))
			-> where("id=".$uid)
			-> find();
		
		$this -> ajaxReturn($list, '成功获取用户信息', 1, 'json');
		
	}
	
	/**
	 * 
	 * 获取用户信息列表
	 */
	public function pullList(){
		
		$this -> isLogin();
		
		$offset = $_REQUEST['offset'];
		$size = $_REQUEST['size'];
		
		if(empty($offset)){
			$offset = 0;
		}
		
		if(empty($size)){
			$size = 10;
		}

		$user = M('User');
		
		$list = $user -> field(array('id', 'nickname', 'name', 'create_time'))
			-> order("id desc")
			-> limit($offset.','.$size)
			-> select();
			
		$this -> ajaxReturn($list, '成功获取用户列表信息', 1, 'json');
		
	}
}