<?php
class ImageviewModel extends ViewModel {
	
    public $viewFields = array(
		'User' => array('id' => 'uid', 'name', 'nickname'),
       	'Image' => array('id', 'title', 'url', 'thumb_url', 'filesize', 'create_time', '_on'=>'User.id=Image.uid')
    );
    
}