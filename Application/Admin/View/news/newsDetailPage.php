  <title>资讯详情页</title>
</head>
<body style="background:#ececec">
<div class="pet_mian" >
    <div class="pet_head">
        <header data-am-widget="header"
          class="am-header am-header-default pet_head_block">
        <div class="am-header-left am-header-nav ">
          <a href="/index.php/Admin/News/showListPage" class="iconfont pet_head_jt_ico">&#xe601;</a>资讯详情
        </div>
        </header>
    </div>
   
    <div class="pet_content pet_content_list">
      <div class="pet_zlnr">
        <div class="pet_zlnr_user">
            <div class="pet_zlnr_user_l"><img src="/upload/<?php echo $row['picture_cover'] ?>" alt=""></div>
            <div class="pet_zlnr_user_r">
                <div class="pet_zlnr_user_r_name"><?php echo $row['title'] ?></div>
                <div class="pet_zlnr_user_r_map"><?php echo $row['intro'] ?></div>
            </div>
        </div>
    <div class="pet_zlnr_nr">
        <article data-am-widget="paragraph"
            class="am-paragraph am-paragraph-default"
            data-am-paragraph="{ tableScrollable: true, pureview: true }">
            <img src="/upload/<?php echo $row['picture_cover'] ?>" alt="">
            <p><?php echo $row['content'] ?></p>
        </article>
    </div></div>
</div>
<div class="pet_article_dowload">
      <div class="pet_article_dowload_title">关于Amaze UI</div>
      <div class="pet_article_dowload_content"><div class="pet_article_dowload_triangle"></div>
      <div class="pet_article_dowload_ico"><img src="/Admin/img/footdon.png" alt=""></div>
      <div class="pet_article_dowload_content_font">
Amaze UI 以移动优先（Mobile first）为理念，从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。
      </div>
      <div class="pet_article_dowload_all">
        <a href="###" class="pet_article_dowload_Az am-icon-apple"> App store</a>
        <a href="###" class="pet_article_dowload_Pg am-icon-android"> Android</a>
      </div>
      </div>
  </div>
        </div>

        <div class="pet_article_footer_info">Copyright(c)2015 PetShow All Rights Reserved</div>
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
        $('.pet_article_like li:last-child').css('border','none');
            function auto_resize(){
            $('.pet_list_one_nr').height($('.pet_list_one_img').height());
                    // alert($('.pet_list_one_nr').height());
        }
            $('.pet_article_user').on('click',function(){
                if($('.pet_article_user_info_tab').hasClass('pet_article_user_info_tab_show')){
                    $('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_show').addClass('pet_article_user_info_tab_cloes');
                }else{
                    $('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_cloes').addClass('pet_article_user_info_tab_show');
                }
            });

            $('.pet_head_gd_ico').on('click',function(){
                $('.pet_more_list').addClass('pet_more_list_show');
        });
            $('.pet_more_close').on('click',function(){
                $('.pet_more_list').removeClass('pet_more_list_show');
            });
    });

    </script>
</body>
  </html>