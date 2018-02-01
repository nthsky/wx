<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxca70a66fc996c259", "986a21558a4bd4d742b4e8dbffc49361");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>abc</title>
</head>
<body>
  <div>测试</div>
  <img id = 'image' src="http://www.nthsky.top/fengmian.jpeg">
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>

<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'error',
      'checkJsApi',
      'onMenuShareTimeline',
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareWeibo',
      'onMenuShareQZone'
    ]
  });
  wx.ready(function () {
    // 在这里调用 API
    wx.error(function(res){
    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
    
    });

    wx.checkJsApi({
      jsApiList: ['onMenuShareTimeline',
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareWeibo'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
      success: function(res) {
      // 以键值对的形式返回，可用的api值true，不可用为false
      // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
      }
    });

    wx.onMenuShareTimeline({
      title: '震惊', // 分享标题
      link: 'http://www.nthsky.top/shareDemo.php', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
      imgUrl: 'http://www.nthsky.top/fengmian.jpeg', // 分享图标
      success: function () {
      // 用户确认分享后执行的回调函数
      },
      cancel: function () {
          // 用户取消分享后执行的回调函数
          }
    });

    wx.onMenuShareAppMessage({
      title: '震惊', // 分享标题
      desc: '某男子XXXXXX', // 分享描述
      link: 'http://www.nthsky.top/shareDemo.php', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
      imgUrl: 'http://www.nthsky.top/fengmian.jpeg', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () {
      // 用户确认分享后执行的回调函数
      },
      cancel: function () {
      // 用户取消分享后执行的回调函数
      }
    });

    wx.onMenuShareQQ({
      title: '震惊', // 分享标题
      desc: '某男子XXXXXX', // 分享描述
      link: 'http://www.nthsky.top/shareDemo.php', // 分享链接
      imgUrl: 'http://www.nthsky.top/fengmian.jpeg', // 分享图标
      success: function () {
      // 用户确认分享后执行的回调函数
      },
      cancel: function () {
      // 用户取消分享后执行的回调函数
      }
    });

    wx.onMenuShareWeibo({
      title: '震惊', // 分享标题
      desc: '某男子XXXXXX', // 分享描述
      link: 'http://www.nthsky.top/shareDemo.php', // 分享链接
      imgUrl: 'http://www.nthsky.top/fengmian.jpeg', // 分享图标
      success: function () {
      // 用户确认分享后执行的回调函数
      },
      cancel: function () {
      // 用户取消分享后执行的回调函数
      }
    });

    
  });
  a = document.getELementById('image');
  a.onclick = function(){
    wx.onMenuShareQZone({
      title: '震惊', // 分享标题
      desc: '某男子XXXXXX', // 分享描述
      link: 'http://www.nthsky.top/shareDemo.php', // 分享链接
      imgUrl: 'http://www.nthsky.top/fengmian.jpeg', // 分享图标
      success: function () {
      // 用户确认分享后执行的回调函数
      },
      cancel: function () {
      // 用户取消分享后执行的回调函数
      }
    });
  };

</script>
</html>
