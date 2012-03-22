<?php
class IndexAction extends Action
{
	/**
	 * 
	 * 初始化
	 */
	function _initialize(){
		
		header("Content-Type:application/json; charset=utf-8");
		
    }
    
    
	public function index(){
		
		$this -> ajaxReturn(null, 'Laiwang Demo Center Test', 0, 'json');
		
	}
}