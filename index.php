<?php
 
  $wechatObj = new wechatCallbackAPI();
  $wechatObj->valid(); 
 
 
  class wechatCallbackAPI {
 
    private $token = "weixin";
 
    private $appId = "wxca70a66fc996c259";
 
    private $appSecret = "986a21558a4bd4d742b4e8dbffc49361";
     
    private function checkSignature() {
      $signature = $_GET["signature"];
      $timestamp = $_GET["timestamp"];
      $nonce = $_GET["nonce"];  
           
      $tmpArr = array($this->token, $timestamp, $nonce);
      sort($tmpArr);
      $tmpStr = implode($tmpArr);
      $tmpStr = sha1($tmpStr);
       
      if($tmpStr == $signature) {
        return true;
      } else {
        return false;
      }
    }
 
    public function valid() {
      $echoStr = $_GET["echostr"];
       
      //valid signature, option
      if($this->checkSignature()){
        echo $echoStr;
        exit;
      }
    }
  }
?>