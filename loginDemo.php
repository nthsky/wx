<?php

session_start();

if($_SESSION['openid']){
		exit('已经授权登录过了。。。');

	} {
		include_once "weixin.class.php";
		$wx_login = new Wxlogin();
		$userinfo = $wx_login->getUserInfo();
		
		if($userinfo['openid']){
			
			$_SESSION['openid'] =  $userinfo['openid'];
			
			var_dump($userinfo);
			
		} else {
			exit('授权失败');
		}
}