<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题添加-有点</title>
<link rel="stylesheet" type="text/css" href="/agree/css/css.css" />
<script type="text/javascript" src="/agree/js/jquery.min.js"></script>
</head>
<body>
  <div id="pageAll">
    <div class="pageTop">
      <div class="page">
        <img src="/agree/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
          href="#">公共管理</a>&nbsp;-</span>&nbsp;话题添加
      </div>
    </div>
    <div class="page ">
      <!-- 上传广告页面样式 -->
      <div class="banneradd bor">
        <div class="baTopNo">
          <span>话题添加</span>
        </div>
        <div class="baBody">
          <div class="bbD">
            合同标题：<input type="text" class="input3" name="a_title"/>
          </div>
          <div class="bbD">
            客户姓名：
                      <select class="input3" name="c_id">
                    @foreach($data as $k=>$v)
                        <option value="c_id">{{$v->c_name}}</option>
                    @endforeach
                      </select>
          </div>
          <div class="bbD">
            客户金额：<input type="text" class="input3" name="a_money"/>
          </div>
          <div class="bbD">
            结束时间：<input type="text" class="input3" name="end_time"/>
          </div>
          
          
          <div class="bbD">
            合同状态：<label><input type="radio" checked="checked"
              name="a_status" value="未审核"/>&nbsp;未审核</label> <label><input
              type="radio" name="a_status" value="已通过"/>&nbsp;已通过</label> <label class="lar"><input
              type="radio" name="a_status" value="不通过"/>&nbsp;不通过</label>
          </div>
          <div class="bbD">
            是否付款：<label><input type="radio" checked="checked"
              name="money_status" value="是"/>&nbsp;是</label><label><input type="radio"
              name="money_status" value="否"/>&nbsp;否</label>
          </div>
          <div class="bbD">
            <p class="bbDP">
              <!-- <button class="btn_ok btn_yes" href="#">提交</button> -->
              <input type="button" value="提交" id="tj" class="btn_ok btn_yes"/>
              <a class="btn_ok btn_no" href="#">取消</a>
            </p>
          </div>
        </div>
      </div>

      <!-- 上传广告页面样式end -->
    </div>
  </div>
</body>
</html>

<script>
  $("#tj").click(function(){
    var fd= new FormData($("#tj")[0]);
    console.log(fd);
  })
</script>