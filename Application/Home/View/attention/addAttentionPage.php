    <h3 class="sub-header">参赛须知->新增须知</h3>

    <div class="panel panel-primary">
        <div class="panel-body">
            <form class="form-horizontal" role="form" id="add_attention_form">
              <div class="form-group">
                <label for="title" class="col-sm-1 control-label">须知标题</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="add_attention_title" name="title" placeholder="请输入标题。。。">
                </div>
              </div>
              <div class="form-group">
                <label for="content" class="col-sm-1 control-label">须知内容</label>
                <div class="col-sm-11">
                  <textarea class="form-control" rows="5" id="add_attention_content" name="content"></textarea>
                </div>
              </div>
            </form>
        </div>
        <div class="panel-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> -->
          <button type="button" class="btn btn-primary add_attention_btn">提交</button>
        </div>
    </div>
    <script>
        $(function(){
            // 开始写 jQuery 代码...
            
        });
        $(".add_attention_btn").click(function(){
            var formData = $("#add_attention_form").serialize();
            var Path = "/index.php/Home/Attention/updateAttentionById";
            $.ajax({
              url:Path,
              type:'POST', //GET
              async:true,    //或false,是否异步
              data:formData,
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
                          // 跳转到须知列表
                          location.href="/index.php/Home/Attention/showListPage";
                        }
                    });
                  }
              }
            });  
        });
    </script>
