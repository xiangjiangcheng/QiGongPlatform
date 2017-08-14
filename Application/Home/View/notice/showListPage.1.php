    <link href="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table-locale-all.js"></script>
    <script src="/vendor/wenzhixin/bootstrap-table/dist/locale/bootstrap-table-zh-CN.js"></script>
    <script src="/vendor/wenzhixin/bootstrap-table/dist//extensions/export/bootstrap-table-export.min.js"></script>
    <h3 class="sub-header">参赛公告->公告列表</h3>
    <div class="table-responsive">
        <table id="test-table" class="col-xs-12" data-toolbar="#toolbar">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>公告标题</th>
                <th>公告内容</th>
                <th>创建时间</th>
                <th>操作</th>
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
                    <h4 class="modal-title" id="myModalLabel">编辑公告</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="edit_notice_form">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">公告标题</label>
                        <div class="col-sm-10">
                        <input type="hidden" id="edit_notice_id" name="id">
                        <input type="text" class="form-control" id="edit_notice_title" name="title" placeholder="请输入标题。。。">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">公告内容</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" rows="5" id="edit_notice_content" name="content"></textarea>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary edit_notice_btn">提交更改</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    
<script>
    $(function(){
        // 开始写 jQuery 代码...
        // ajax加载页面数据[初始化]
        initTable();
        var Path = "/index.php/Home/Notice/getAll";
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
                        +  "<td>"+rows[i].createtime+"</td>"
                        +  "<td><button type='button' class='btn btn-info btn-sm edit_btn' data-toggle='modal' data-target='#myModal' data-id='"+rows[i].id+"'>编辑</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm del_btn' data-id='"+rows[i].id+"'>删除</button></td></tr>";
                }
                // 清空tbody再追加
                $("tbody").empty().append(html);
                // 初始化编辑，删除事件
                $(".edit_btn").click(function(){
                    var id = $(this).attr('data-id');
                    var Path = "/index.php/Home/Notice/getNoticeById";
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
                            $("#edit_notice_id").val(data.rows[0].id);
                            $("#edit_notice_title").val(data.rows[0].title);
                            $("#edit_notice_content").val(data.rows[0].content);
                        }
                    }
                    });
                });
                $(".del_btn").click(function(){
                    // alert("是否删除？");
                    var id = $(this).attr('data-id');
                    var Path = "/index.php/Home/Notice/deleteNoticeById";
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
    $(".edit_notice_btn").click(function(){
        var Path = "/index.php/Home/Notice/updateNoticeById";
        var formData = $("#edit_notice_form").serialize();
        $.ajax({
            url:Path,
            type:'POST', //GET
            async:true,    //或false,是否异步
            data:formData,
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

    // 表格分页，初始化
    function initTable(){
        $('#test-table').bootstrapTable({
            method: 'post',
            toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: false,      //是否启用排序
            sortOrder: "asc",     //排序方式
            pageNumber:1,      //初始化加载第一页，默认第一页
            pageSize: 10,      //每页的记录行数（*）
            pageList: [10, 25, 50, 100],  //可供选择的每页的行数（*）
            url: "/index.php/Home/Notice/getAll",//这个接口需要处理bootstrap table传递的固定参数
            queryParamsType:'', //默认值为 'limit' ,在默认情况下 传给服务端的参数为：offset,limit,sort
                                // 设置为 ''  在这种情况下传给服务器的参数为：pageSize,pageNumber

            //queryParams: queryParams,//前端调用服务时，会默认传递上边提到的参数，如果需要添加自定义参数，可以自定义一个函数返回请求参数
            sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            //search: true,      //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: true,
            //showColumns: true,     //是否显示所有的列
            //showRefresh: true,     //是否显示刷新按钮
            minimumCountColumns: 2,    //最少允许的列数
            clickToSelect: true,    //是否启用点击选中行
            searchOnEnterKey: true,
            columns: [{
                field: 'id',
                title: '序号',
                align: 'center'
            }, {
                field: 'title',
                title: '公告标题',
                editable:true,
                align: 'center'
            }, {
                field: 'content',
                title: '公告内容',
                editable:true,
                align: 'center'
            }, {
                field: 'createtime',
                title: '创建时间',
                align: 'center'
            }, {
                field: 'id',
                title: '操作',
                align: 'center',
                formatter:function(value,row,index){
                    //通过formatter可以自定义列显示的内容
                    //value：当前field的值，即id
                    //row：当前行的数据
                    var a = '<a href="" >测试</a>';
                } 
            }],
            pagination:true
        });
    }
</script> 