    <h3 class="sub-header">参赛资讯->新增资讯</h3>

    <div class="panel panel-primary">
        <div class="panel-body">
            <form class="form-horizontal" role="form" id="add_news_form" enctype="multipart/form-data"> 
              <div class="form-group">
                <label for="title" class="col-sm-1 control-label">资讯标题</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="add_news_title" name="title" placeholder="请输入标题。。。">
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-1 control-label">资讯简介</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="add_news_intro" name="intro" placeholder="请输入简介。。。">
                </div>
              </div>
              
              <div class="form-group">
                <label for="content" class="col-sm-1 control-label">资讯内容</label>
                <div class="col-sm-11">
                  <textarea class="form-control" rows="5" id="add_news_content" name="content"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-1 control-label">封面图</label>
                <div class="col-sm-11">
                   <input type="file" id="add_news_picture_cover" name="picture_cover"> 
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-1 control-label">上传视频(*可不选)</label>
                <div class="col-sm-11">
                   <input type="file" id="add_news_video" name="video" > 
                </div>
              </div>
            </form>
        </div>
        <div class="panel-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> -->
          <button type="button" class="btn btn-primary add_news_btn">提交</button>
        </div>
    </div>
    <script>
        $(function(){
            // 开始写 jQuery 代码...
            
        });
        $(".add_news_btn").click(function(){
          // 文件不为空 上传文件
          // if() {

          // }

            var formData = new FormData($("#add_news_form" )[0]);  
            // var formData = $("#add_news_form").serialize();
            var Path = "/index.php/Home/News/updateNewsById";
            $.ajax({
              url:Path,
              type:'POST', //GET
              async:true,    //或false,是否异步
              data:formData,
              contentType: false,// 当有文件要上传时，此项是必须的，否则后台无法识别文件流的起始位置(详见：#1)
              processData: false,// 是否序列化data属性，默认true(注意：false时type必须是post，详见：#2)
              timeout:5000,    //超时时间
              dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
              success:function(data){
                  if(data.status){
                    $.alert({
                        title: '提示!',
                        content: '新增成功!',
                        confirm: function(){
                          // 重新加载该页面
                          // location.reload();
                          // 跳转到资讯列表
                          location.href="/index.php/Home/News/showListPage";
                        }
                    });
                  }
              }
            });  
        });
    </script>
