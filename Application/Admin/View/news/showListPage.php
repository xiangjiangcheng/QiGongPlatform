
    <title>资讯列表</title>
</head>
<body>
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
    <a href="#top" title="">
        <img class="am-gotop-icon-custom" src="/Admin/img/goTop.png" />
    </a>
</div>
<div class="pet_mian" id="top">
<div class="pet_content_main">
    <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
    <div class="am-list-news-bd">
    <div>
        <p><span><a href="/index.php/Admin/Index/index" ><<返回</a><span>大赛资讯 </p>
        <ul class="am-list" id="news_ul">
            <!--缩略图在标题右边-->
             
        </ul>
  </div>
</div>
<div class="pet_article_dowload pet_dowload_more_top_off">
      <div class="pet_article_dowload_title">关于Amaze UI</div>
       
      <div class="pet_article_footer_info">Copyright(c)2015 Amaze UI All Rights Reserved.模板收集自 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> -  More Templates  <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></div>
</div>
</div>
</div>


<script>
    $(function(){
        // 加载资讯消息
        var Path = "/index.php/Admin/News/getAll";
        $.ajax({
            url:Path,
            type:'POST', //GET
            async:false,    //或false,是否异步
            data:{},
            timeout:5000,    //超时时间
            dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
            success:function(data,textStatus,jqXHR){
                var html = "";
                var rows = data.rows;
                for (var i = 0; i < rows.length; i++) {
                    html+= "<li class='am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_list_one_block'>"
                        +"<div class='am-u-sm-8 am-list-main pet_list_one_nr'>"
                        +"<h3 class='am-list-item-hd pet_list_one_bt'><a href='/index.php/Admin/News/newsDetailPage?id="+rows[i].id+"' class=''>"+rows[i].title+"["+rows[i].createtime+"]</a></h3>"
                        +"<div class='am-list-item-text pet_list_one_text' class=''>"+rows[i].content+"</div>"
                        +"</div>"
                        +"<div class='am-u-sm-4 am-list-thumb'>"
                        +"    <a href='###'>"
                        +"    <img src='/upload/"+rows[i].picture_cover+ "' class='pet_list_one_img' alt='我很囧，你保重....晒晒旅行中的那些囧！'/>"
                        +"    </a>"
                        +"</div>"
                        +"</li>";
                }
                // 清空tbody再追加
                $("#news_ul").empty().append(html);
            } 
        })

        // 动态计算新闻列表文字样式
        auto_resize();
        $(window).resize(function() {
            auto_resize();
        });
        $('.am-list-thumb img').load(function(){
            auto_resize();
        });

        $('.am-list > li:last-child').css('border','none');
        function auto_resize(){
            $('.pet_list_one_nr').height($('.pet_list_one_img').height());

        }
            $('.pet_nav_gengduo').on('click',function(){
                $('.pet_more_list').addClass('pet_more_list_show');
        });
            $('.pet_more_close').on('click',function(){
                $('.pet_more_list').removeClass('pet_more_list_show');
            });
    });

    

</script>
</body>
</html>