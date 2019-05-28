<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>会员注册</title>
    <link rel="shortcut icon" href="/index/images/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="/index/css/bootstrap.min.css" rel="stylesheet">
    <link href="/index/css/style.css" rel="stylesheet">
    <link href="/index/css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond./index/js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @if (session('status'))
   <div class="alert alert-success">
      <script>alert("{{ session('status') }}")</script>
   </div>
    @endif
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <form action="/user/registerhandle" method="get" id="a" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="login.html">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="输入手机号码或者邮箱号" name="u_email" class="u_email" /></div>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" name="u_code" class="u_code"/> 
       <button class="code2">获取验证码</button>
       </div>
       <div class="lrList"><input type="password" placeholder="设置新密码（6-18位数字或字母）" name="u_pwd" class="u_pwd"/></div>
       <div class="lrList"><input type="password" placeholder="再次输入密码" name="pwd1" class="pwd1"/></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="button" value="立即注册"  class="btn" />
      </div>
      <script src="/js/jquery.js"></script>

      <script>
      var flag=false;
      $('.code2').click(function(){
        // alert(11);
        var u_email = $('.u_email').val();
        // console.log(u_email);
        $.get(
            "/user/doreg",
            {u_email:u_email},
            function(res)
            {
              // console.log(res);
              if (res.u_code==1) {
                alert('发送成功');
              };
            }
          );
        return false;
      })
      $('.btn').click(function(){
        //   alert(11);
        var u_email = $('.u_email').val();
        // console.log(u_email);
        var u_code = $('.u_code').val();
        // console.log(u_code);
        var u_pwd = $('.u_pwd').val();
        // console.log(u_pwd);
        var pwd1 = $('.pwd1').val();
        // console.log(pwd1);
        if (u_pwd != pwd1) {
          alert('两次密码不一致');
          return flag;
        };
          if (u_email=='') {
          alert('邮箱不能为空');
        }else{
          $.get(
            "/user/email",
            {u_email:u_email},
            function(res)
            {
              console.log(res);
            //   if (res.u_code==1) {
            //     alert(res.msg);
            //   };
            },'json'
          );
        }
        $('#a').submit();
           return false;

      });
      $('.u_email').blur(function(){
        // alert(11);
        var u_email = $('.u_email').val();
        console.log(u_email);
        if (u_email=='') {
          alert('邮箱不能为空');
        }else{
          $.get(
            "/user/email",
            {u_email:u_email},
            function(res)
            {
              console.log(res);
              if (res.code==1) {
                alert(res.msg);
              };
            },'json'
          );
        }
        
        return false;
      })
      </script>