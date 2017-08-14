$(function () {

        //1.初始化Table
        var oTable = new TableInit();
        oTable.Init();

        //2.初始化Button的点击事件
        var oButtonInit = new ButtonInit();
        oButtonInit.Init();

    });


    var TableInit = function () {
        var oTableInit = new Object();
        //初始化Table
        oTableInit.Init = function () {
            $('#tb_notice').bootstrapTable({
                url: '/index.php/Home/Notice/getAll/',         //请求后台的URL（*）
                method: 'get',                      //请求方式（*）
                toolbar: '#toolbar',                //工具按钮用哪个容器
                striped: true,                      //是否显示行间隔色
                cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                pagination: true,                   //是否显示分页（*）
                sortable: false,                     //是否启用排序
                sortOrder: "asc",                   //排序方式
                queryParams: oTableInit.queryParams,//传递参数（*）
                sidePagination: "server",           //分页方式：client客户端分页，server服务端分页（*）
                pageNumber:1,                       //初始化加载第一页，默认第一页
                pageSize: 5,                       //每页的记录行数（*）
                pageList: [5, 25, 50, 100],        //可供选择的每页的行数（*）
                search: false,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
                strictSearch: true,
                showColumns: true,                  //是否显示所有的列
                showRefresh: true,                  //是否显示刷新按钮
                minimumCountColumns: 2,             //最少允许的列数
                clickToSelect: true,                //是否启用点击选中行
                // height: 500,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
                uniqueId: "ID",                     //每一行的唯一标识，一般为主键列
                showToggle:true,                    //是否显示详细视图和列表视图的切换按钮
                cardView: false,                    //是否显示详细视图
                detailView: false,                   //是否显示父子表
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                columns: [{
                    checkbox: true
                }, {
                    field: 'id',
                    title: '序号',
                    width: '100'
                }, {
                    field: 'title',
                    title: '公告标题',
                    width: '200'
                }, {
                    field: 'content',
                    title: '公告内容',
                    width: '500',
                }, {
                    field: 'createtime',
                    title: '创建时间',
                    width: '200'
                }, ]
            });
        };

        //得到查询的参数
        oTableInit.queryParams = function (params) {
            var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
                limit: params.limit,   //页面大小
                offset: params.offset,  //页码
                title: $("#txt_search_title").val(),
                content: $("#txt_search_content").val()
            };
            return temp;
        };
        return oTableInit;
    };


    var ButtonInit = function () {
        var oInit = new Object();
        var postdata = {};

        oInit.Init = function () {
            //初始化页面上面的按钮事件
            // 新增
            $("#btn_add").click(function () {

               $("#myModalLabel").text("新增");
               $("#myModal").find(".form-control").val(""); //清空
               $('#myModal').modal();
            });

            $("#btn_edit").click(function () {
               var arrselections = $("#tb_notice").bootstrapTable('getSelections');
               if (arrselections.length > 1) {
                    $.alert({
                        title: '提示!',
                        content: '只能选择一行进行编辑!',
                    });
                    return;
               }
               if (arrselections.length <= 0) {
                    $.alert({
                        title: '提示!',
                        content: '请选择有效数据!',
                    });
                    return;
               }
               $("#myModalLabel").text("编辑");
               $("#edit_notice_title").val(arrselections[0].title);
               $("#edit_notice_content").val(arrselections[0].content);
               $("#edit_notice_id").val(arrselections[0].id);
               $('#myModal').modal('show');
            });

            $("#btn_delete").click(function () {
               var arrselections = $("#tb_notice").bootstrapTable('getSelections');
               if (arrselections.length <= 0) {
                    $.alert({
                        title: '提示!',
                        content: '请选择有效数据!',
                    });
                    return;
                }
                // if (arrselections.length > 1) {
                //     $.alert({
                //         title: '提示!',
                //         content: '每次只能删除一条数据!',
                //     });
                //     return;
                // }

                // 得到要删除数据的id，用,隔开
                var idStr = '';
                for (var i = 0; i < arrselections.length; i++) {
                    idStr += arrselections[i].id + ',';
                }
                idStr=idStr.substring(0,idStr.length-1); // 去掉最后一个,号
                var Path = "/index.php/Home/Notice/deleteNoticeById";
                $.confirm({
                    title: '提示!',
                    content: '确认要删除选择的数据吗？!',
                    confirm: function(){
                        $.ajax({
                            url:Path,
                            type:'POST', //GET
                            async:true,    //或false,是否异步
                            data:{'idStr':idStr},
                            timeout:5000,    //超时时间
                            dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                            success:function(data){
                                if (data.status) {
                                    $.alert({
                                        title: '提示!',
                                        content: '删除成功!',
                                        confirm: function(){
                                            // 重新加载表格
                                            $("#tb_notice").bootstrapTable('refresh');
                                        }
                                    });
                                
                                } else {
                                     $.alert({
                                        title: '提示!',
                                        content: '删除失败!'
                                    });
                                }
                            }
                        });
                    },
                    cancel: function(){
                        // $.alert('Canceled!')
                    }
                });
               
            });

            $(".btn_submit").click(function () {
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
                        $('#myModal').modal('hide');
                        $.alert({
                            title: '提示!',
                            content: '操作成功!',
                            confirm: function(){
                                // 重新刷新表格
                                $("#tb_notice").bootstrapTable('refresh');
                            }
                        });
                        }
                    }
                });  
                
            });

            //$("#btn_query").click(function () {
            //    $("#tb_notice").bootstrapTable('refresh');
            //});

        };

        return oInit;
    };