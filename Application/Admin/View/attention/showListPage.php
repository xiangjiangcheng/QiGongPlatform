
    <title>参数须知列表</title>
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
        <p><span><a href="/index.php/Admin/Index/index" ><<返回</a><span>参赛须知</p>
        <ul class="am-list" id="news_ul">
            <!--缩略图在标题右边-->
             <!--二维关联数组的2次遍历-->
            <?php foreach ($rows as $key=>$row) { ?> 
            <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_list_one_block">
                <div class="am-u-sm-8 am-list-main pet_list_one_nr">
                    <h3 class="am-list-item-hd pet_list_one_bt">
                        <?php echo "<a href='/index.php/Admin/Attention/attentionDetailPage?id=" . $row['id'] . "' class=''>".$row['title']."[".$row['createtime']."]</a></h3>" ?>
                        <div class="am-list-item-text pet_list_one_text" class="">
                        
                        <?php echo $row['content'] ?>
                        </div>
                        </div>
                        <div class="am-u-sm-4 am-list-thumb">
                            <a href="###">
                            <img src="/Admin/img/q1.jpg" class="pet_list_one_img" alt="我很囧，你保重....晒晒旅行中的那些囧！"/>
                            </a>
                </div>
            </li>
             
            <?php } ?> 
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