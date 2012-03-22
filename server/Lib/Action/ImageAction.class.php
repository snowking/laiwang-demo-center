<?php
/**
 * @Date 2012.3.12
 * @File: ImageAction.class.php
 * @Author Leyteris
 */
class ImageAction extends BaseAction
{
    /**
     * 
     * 上传图片接口
     */
    public function push(){

    	$this -> isLogin();
    	
		import("ORG.Net.UploadFile");
		
		$upload = new UploadFile();
		
		$upload -> allowExts = array('jpg', 'gif', 'png', 'jpeg');
		$upload -> savePath = getUploadPath();
		$upload -> saveRule = 'uniqid';
		$upload -> thumb = true;
		$upload -> thumbMaxWidth = "120,2048";
		$upload -> thumbMaxHeight = "120,2048";
		
		if($upload -> upload()) {
			
			$info = $upload -> getUploadFileInfo();
			
			$thumb = $upload -> thumbPrefix;
			
			$data['uid'] = getUid();
			$data['title'] = $info[0]['name'];
			$data['create_time'] = time();
			$data['url'] = getShowPath().$info[0]['savename'];
			$data['thumb_url'] = getShowPath().$thumb.$info[0]['savename'];
			$data['filesize'] = $info[0]['size'];
			
			$img = M('Image');
			
			if($imgid = $img -> add($data)){
				$data['id'] = $imgid;
				
				$this -> ajaxReturn($data, '成功上传文件 ', 1, 'json');	
			}else{
				$this -> ajaxReturn(null, '上传文件出错！', 0, 'json');
			}
		}else{ 
			$this -> ajaxReturn(null, $upload -> getErrorMsg(), 0, 'json');
		} 
		
	}
	
	/**
	 * 
	 * 获取图片信息
	 */
	public function pull(){
		
		$this -> isLogin();
		
		$uid = $_REQUEST['uid'];
		$offset = $_REQUEST['offset'];
		$size = $_REQUEST['size'];
		
		if(empty($offset)){
			$offset = 0;
		}
		
		if(empty($size)){
			$size = 1;
		}

		$model = D('Imageview');
		
		$list = $model ->where("User.id=".$uid)
			->order("create_time desc")
			->limit($offset.','.$size)
			->select();
			
		$this -> ajaxReturn($list, '成功获取图片信息', 1, 'json');
		
	}

}