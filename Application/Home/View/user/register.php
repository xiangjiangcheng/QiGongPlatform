<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8"> 
    <title>注册页面</title> 
    </head>
    <body>
        <?php
            include BASE_VIEW . "/include/head.php";
        ?>
       
        <h1>注册</h1>
            <form name="form1" method="post" action="<?php echo WEBSITE_DOMAIN?>/index.php?/Home/User/login_in">
                <table width="280" height="96" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
                <tr>
                    <td colspan="2" align="center" bgcolor="#FFFFFF">用户注册</td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#FFFFFF">用户名:</td>
                    <td align="left" bgcolor="#FFFFFF"> 
                    <input type="text" name="user_name" size="12">        
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#FFFFFF">口令:</td>
                    <td align="left" bgcolor="#FFFFFF"> 
                    <input type="password" name="user_pw" size="12"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" bgcolor="#FFFFFF">
                    <input type="submit" value="提交">&nbsp;
                    <input type="reset" value="重置"></td>
                </tr>
                </table>
	        </form>
            <input id="test" >
    </body>
    <!-- <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"> -->
    <!-- <script src="<?php echo WEBSITE_DOMAIN?>/index.php/Public/js/jquery.min.js"> </script> -->
     <script src="<?php echo WEBSITE_DOMAIN?>/js/jquery.min.js"> </script> 
    <script>
        $(function(){
            // 开始写 jQuery 代码...
            var Path = "<?php echo WEBSITE_DOMAIN?>/index.php/Home/User/test";
            //alert(Path);
            $.ajax({
                url:Path,
                type:'POST', //GET
                async:true,    //或false,是否异步
                data:{
                    user_name:'yang',
                    user_pw:'123456'
                },
                timeout:5000,    //超时时间
                dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                success:function(data,textStatus,jqXHR){
                    // console.log(data)
                    // console.log(textStatus)
                    // console.log(jqXHR)
                    // alert("ok");
                    $("#test").val(data.rows[0].ui_name);
                } 
            })
        });
    </script>
</html>