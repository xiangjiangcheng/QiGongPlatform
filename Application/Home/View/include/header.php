<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    
    <title>气功大赛</title>
    <script src="<?php echo WEBSITE_DOMAIN?>/Js/jquery-1.11.0.min.js"> </script> 
    <!-- Bootstrap -->
    <link href="<?php echo PATH_BOOTSTRAP ?>/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="<?php echo PATH_BOOTSTRAP ?>/js/bootstrap.min.js"></script>
    
    <!-- jqueryConfirm  -->
    <link rel="stylesheet" type="text/css" href="/Css/jquery-confirm.css">
    <script src="<?php echo WEBSITE_DOMAIN?>/Js/jquery-confirm.js"> </script> 
    
    <link href="/Css/main.css" rel="stylesheet"> 
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="www.qigongplatform.com">气功大赛平台</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#">介绍</a></li>
            <li><a href="/index.php/Admin/Index/index">切换</a></li>
            <li><a href="#">登录</a></li>
            <li><a href="#">注销</a></li>
          </ul> 
          
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="搜索...">
          </form>
        </div>
      </div>
    </nav>
    <div class="container-fluid" style="margin-top:60px;">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul id="main-nav" class="nav nav-tabs nav-stacked" style="">
            <li class="active">
              <a href="#">
              <i class="glyphicon glyphicon-th-large"></i>首页 </a>
            </li>
              
            <li>
              <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse" id="menu_btn_1" >
              <i class="glyphicon glyphicon-cog"></i>
              参赛须知管理
              <span class="pull-right glyphicon glyphicon-chevron-down"></span>
              </a>
              <ul id="systemSetting" class="nav nav-list collapse secondmenu" style="height: 0px;" data-id="1">
                <li id="l1"><a href="#" data-url="<?php echo WEBSITE_DOMAIN?>/index.php/Home/Attention/showListPage"><i class="glyphicon glyphicon-calendar"></i>须知列表</a></li>
                <li id="l2"><a href="#" data-url="<?php echo WEBSITE_DOMAIN?>/index.php/Home/Attention/addAttentionPage"><i class="glyphicon glyphicon-th-list"></i>新建须知</a></li>
              </ul>
            </li>

            <li>
              <a href="#systemNotice" class="nav-header collapsed" data-toggle="collapse" id="menu_btn_2" >
              <i class="glyphicon glyphicon-credit-card"></i>
              参赛公告
              <span class="pull-right glyphicon glyphicon-chevron-down"></span>
              </a>
              <ul id="systemNotice" class="nav nav-list collapse secondmenu" style="height: 0px;" data-id="2">
                <li id="l3"><a href="#" data-url="<?php echo WEBSITE_DOMAIN?>/index.php/Home/Notice/showListPage"><i class="glyphicon glyphicon-calendar"></i>公告列表</a></li>
                <li id="l4"><a href="#" data-url="<?php echo WEBSITE_DOMAIN?>/index.php/Home/Notice/addNoticePage"><i class="glyphicon glyphicon-th-list"></i>新建公告</a></li>
              </ul>
            </li>

            <li>
              <a href="#systemInfo" class="nav-header collapsed" data-toggle="collapse" id="menu_btn_3" >
              <i class="glyphicon glyphicon-globe"></i>
              资讯管理
              <span class="pull-right glyphicon glyphicon-chevron-down"></span>
              </a>
              <ul id="systemInfo" class="nav nav-list collapse secondmenu" style="height: 0px;" data-id="3">
                <li id="l5"><a href="#" data-url="<?php echo WEBSITE_DOMAIN?>/index.php/Home/News/showListPage"><i class="glyphicon glyphicon-calendar"></i>资讯列表</a></li>
                <li id="l6"><a href="#" data-url="<?php echo WEBSITE_DOMAIN?>/index.php/Home/News/addNewsPage"><i class="glyphicon glyphicon-th-list"></i>新增资讯</a></li>
              </ul>
            </li>

            <li>
              <a href="#systemGame" class="nav-header collapsed" data-toggle="collapse" id="menu_btn_4" >
              <i class="glyphicon glyphicon-calendar"></i>
              游戏管理
              <span class="pull-right glyphicon glyphicon-chevron-down"></span>
              </a>
              <ul id="systemGame" class="nav nav-list collapse secondmenu" style="height: 0px;" data-id="4">
                <li id="l7"><a href="#" data-url="<?php echo WEBSITE_DOMAIN?>/index.php/Home/UserWin/showListPage"><i class="glyphicon glyphicon-user"></i>中奖用户信息</a></li>
                <!-- <li><a href="#"><i class="glyphicon glyphicon-th-list"></i>新建公告</a></li> -->
              </ul>
            </li>
            <li>
              <a href="#" id="menu_btn_5">
              <i class="glyphicon glyphicon-fire"></i>
              关于系统
              </a>
            </li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-md-10" id="contentDiv">
          <!-- <h1 class="page-header">内容面板</h1> -->
            <?php echo $content ?>
         
        </div>
      </div>
    </div>
    <script>
        $(function(){
            // 开始写 jQuery 代码...
            var menuids = "<?php echo $menuid ?>";
            // 分割字符串，得到所有展开的id数组
            var menuidArr = menuids.split(',');
            // 自动执行点击事件
            for (i =0; i < menuidArr.length; i++) {
                $("#menu_btn_"+menuidArr[i]).trigger("click");
            }
        });

        // 控制菜单显示
        $("#main-nav ul li").click(function(){
          // 内容页面清空
          $("#contentDiv").empty();
          // 得到展开菜单的id
          var menuids = "";
          $("#main-nav ul").each(function() {
            var flag = "nav nav-list secondmenu collapse in";
            
            if ($(this).attr('class') == flag) {
              // alert($(this).attr('class'));
              // 得到菜单id
              menuids += $(this).attr("data-id")+",";
            }
            
          });
          // 去掉最后一个,
          menuids = menuids.substr(0,menuids.length-1);
          // alert(menuids);

          var url = $(this).children("a").attr('data-url')+"/id/"+menuids;
          // $("#contentDiv").load(url); // 加载对应的页面
          location.href = url;

        });
    </script>
  </body>
</html>
