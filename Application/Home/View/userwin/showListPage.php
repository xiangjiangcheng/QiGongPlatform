    <link href="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="/vendor/wenzhixin/bootstrap-table/dist/bootstrap-table-locale-all.js"></script>
    <script src="/vendor/wenzhixin/bootstrap-table/dist/locale/bootstrap-table-zh-CN.js"></script>
    <script src="/vendor/wenzhixin/bootstrap-table/dist//extensions/export/bootstrap-table-export.min.js"></script>
    <h3 class="sub-header">游戏管理->中奖用户信息</h3>
    <div class="panel-body" style="padding-bottom:0px;">
        <!-- <div class="panel panel-default">
            <div class="panel-heading">查询条件</div>
            <div class="panel-body">
                <form id="formSearch" class="form-horizontal">
                    <div class="form-group" style="margin-top:15px">
                        <label class="control-label col-sm-1" for="txt_search_title">公告标题</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="txt_search_title">
                        </div>
                        <label class="control-label col-sm-1" for="txt_search_content">内容</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="txt_search_content">
                        </div>
                        <div class="col-sm-4" style="text-align:left;">
                            <button type="button" style="margin-left:50px" id="btn_query" class="btn btn-primary">查询</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        -->

        <div id="toolbar" class="btn-group">
            <button id="btn_add" type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
            </button>
            <button id="btn_edit" type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
            </button>
            <button id="btn_delete" type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
            </button>
        </div>
        <table id="tb_userwin"></table>

        <!-- 模态框（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">编辑中奖用户信息</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="edit_userwin_form">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">微信号</label>
                            <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="edit_userwin_id" name="id">
                            <input type="text" class="form-control" id="edit_userwin_weixin_id" name="weixin_id" placeholder="请输入微信号。。。">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">联系电话</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit_userwin_tell" name="tell" placeholder="请输入电话。。。">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label">奖品内容</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="edit_userwin_prize_name" name="prize_name"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label">是否发货</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="issent" id="edit_userwin_issent">
                                    <option value="1">是</option>
                                    <option value="0">否</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label">备注</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="edit_userwin_remark" name="remark"></textarea>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary btn_submit">提交更改</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
    
    </div>
    <script src="/Js/mine/userwin.js"></script>
