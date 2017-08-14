    <!-- bootstrap table -->
    <link href="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table-locale-all.js"></script>
    <script src="/vendor/wenzhixin/bootstrap-table/dist//extensions/export/bootstrap-table-export.min.js"></script>
    <style>
        img {
            width: 80px;
            vertical-align: middle;
        }
    
    </style>
    <h3 class="sub-header">资讯管理->资讯列表</h3>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th width="3%">#</th>
            <th width="15%">资讯标题</th>
            <th width="47%">资讯内容</th>
            <th width="10%">封面图</th>
            <th width="15%">创建时间</th>
            <th width="7%">操作</th>
        </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    </div>
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">编辑资讯</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="edit_news_form" enctype="multipart/form-data"> 
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">资讯标题</label>
                <div class="col-sm-10">
                    <input type="hidden" id="edit_news_id" name="id" >
                  <input type="text" class="form-control" id="edit_news_title" name="title" placeholder="请输入标题。。。">
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">资讯简介</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="edit_news_intro" name="intro" placeholder="请输入简介。。。">
                </div>
              </div>
              
              <div class="form-group">
                <label for="content" class="col-sm-2 control-label">资讯内容</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="5" id="edit_news_content" name="content"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">封面图</label>
                <div class="col-sm-10">
                    <img id="pic_img" style="display:none;"></img>
                    <input type="file" id="edit_news_picture_cover" name="picture_cover"> 
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">上传视频(*可不选)</label>
                <div class="col-sm-10">
                   <input type="file" id="edit_news_video" name="video" > 
                </div>
              </div>
            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary edit_news_btn">提交更改</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    
    <script>
        $(function(){
            // 开始写 jQuery 代码...
            // ajax加载页面数据[初始化]
            var Path = "/index.php/Home/News/getAll";
            $.ajax({
                url:Path,
                type:'POST', //GET
                async:true,    //或false,是否异步
                data:{},
                timeout:5000,    //超时时间
                dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                success:function(data,textStatus,jqXHR){
                    var html = "";
                    var rows = data.rows;
                    for (var i = 0; i < rows.length; i++) {
                    // html += "<tr><td>"+rows[i].title+"</td></tr>";
                    html += "<tr><td>"+(i+1)+"</td>"
                            +  "<td>"+rows[i].title+"</td>"
                            +  "<td>"+rows[i].content+"</td>"
                            +  "<td><img src='/upload/"+rows[i].picture_cover+"'></img></td>"
                            +  "<td>"+rows[i].createtime+"</td>"
                            +  "<td><button type='button' class='btn btn-info btn-sm edit_btn' data-toggle='modal' data-target='#myModal' data-id='"+rows[i].id+"'>编辑</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm del_btn' data-id='"+rows[i].id+"'>删除</button></td></tr>";
                    }
                    // 清空tbody再追加
                    $("tbody").empty().append(html);
                    // 初始化编辑，删除事件
                    $(".edit_btn").click(function(){
                        var id = $(this).attr('data-id');
                        var Path = "/index.php/Home/News/getNewsById";
                        // alert(id);
                        // 给模态框赋值
                        $.ajax({
                        url:Path,
                        type:'POST', //GET
                        async:true,    //或false,是否异步
                        data:{'id':id},
                        timeout:5000,    //超时时间
                        dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                        success:function(data){
                            if (data) {
                                $("#edit_news_id").val(data.rows[0].id);
                                $("#edit_news_title").val(data.rows[0].title);
                                $("#edit_news_intro").val(data.rows[0].intro);
                                $("#edit_news_content").val(data.rows[0].content);
                                // 封面图
                                if (data.rows[0].picture_cover) {
                                    // 显示图片
                                    $("#pic_img").show();
                                    $("#pic_img").attr("src", "/upload/"+data.rows[0].picture_cover);
                                } else {
                                    // 隐藏图片
                                    $("#pic_img").hide();
                                }
                            } 
                        }
                        });
                    });
                    $(".del_btn").click(function(){
                        // alert("是否删除？");
                        var id = $(this).attr('data-id');
                        var Path = "/index.php/Home/News/deleteNewsById";
                        $.confirm({
                        title: '提示!',
                        content: '是否删除!',
                        confirm: function(){
                            $.ajax({
                                url:Path,
                                type:'POST', //GET
                                async:true,    //或false,是否异步
                                data:{'id':id},
                                timeout:5000,    //超时时间
                                dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                                success:function(data){
                                    if (data.status) {
                                    $.alert({
                                        title: '提示!',
                                        content: '删除成功!',
                                        confirm: function(){
                                            // 重新加载该页面
                                            location.reload();
                                        }
                                    });
                                    
                                    } else {
                                    alert('删除失败!');
                                    }
                                }
                            });
                        },
                        cancel: function(){
                            // $.alert('Canceled!')
                        }
                        });
                    });
                } 
            })
        });

        // 修改 
        $(".edit_news_btn").click(function(){
            var Path = "/index.php/Home/News/updateNewsById";
            var formData = new FormData($("#edit_news_form" )[0]); 
            // var formData = $("#edit_news_form").serialize();
            // 给模态框赋值
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
                    // alert("修改成功！");
                    $('#myModal').modal('hide');
                    $.alert({
                        title: '提示!',
                        content: '修改成功!',
                        confirm: function(){
                                
                                // 重新加载该页面
                                location.reload();
                        }
                    });
                    }
                }
            });  
        });
    </script> 