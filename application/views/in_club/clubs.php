<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:08
 */
?>
<div class="col-md-2 inPage-sm">
    <div class="row pageInner-sm">
        <button class="btn btn-sm btn-success searchStarter">邀请成员</button>
    </div>
    <div class="pageInner">
        <p>成员</p>
        <div class="member">
            <a href="/people/his_data">origalin</a>
        </div>
        <div class="member">
            <a href="/people/his_data">origalin</a>
        </div>
        <div class="member">
            <a href="/people/his_data">origalin</a>
        </div>
        <div class="member">
            <a href="/people/his_data">origalin</a>
        </div>
        <div class="member">
            <a href="/people/his_data">origalin</a>
        </div>
    </div>
</div>
<div class="col-md-8 inPage">
    <div class="row pageInner">
        <h2>XX俱乐部</h2>
        <p>山西太原</p>
        <p>篮球</p>
        <p>主席：<a href="/people/his_data">origalin</a></p>
        <p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p>
    </div>
    <div class="row pageInner">
        <div class="form-group">
            <label for="textTitle">标题:</label>
            <input class="form-control" id="textTitle"></div>
        <div class="form-group">
            <textarea id="textPanel" rows="4" placeholder="请留言" class="form-control"></textarea>
        </div>
        <button class="btn btn-success pull-right">提交</button>
    </div>
</div>
<div class="col-md-2 inPage-sm">
    <div class="row pageInner-sm">
        <button class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#nPublicModal">添加公告</button>
    </div>
    <div class="pageInner-sm" onclick="$('#nPublicPanel').modal('toggle')">
        <div class="row">
            title
        </div>
        <div class="row text">
            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
        </div>
        <div class="row">
            2016/10/14 9:26
        </div>
    </div>
    <div class="pageInner-sm">
        <div class="row">
            title
        </div>
        <div class="row text">
            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
        </div>
        <div class="row">
            2016/10/14 9:26
        </div>
    </div>
    <div class="pageInner-sm">
        <div class="row">
            title
        </div>
        <div class="row text">
            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
        </div>
        <div class="row">
            2016/10/14 9:26
        </div>
    </div>
</div>
<div id="nPublicModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">x</button>
                <h2 class="text-left text-primary">新公告</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="publicTitle">标题:</label>
                    <input class="form-control" id="publicTitle"></div>
                <div class="form-group">
                    <textarea id="publicPanel" rows="4" placeholder="请留言" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-success" id="confirmInvite">确认邀请</button>
            </div>
        </div>
    </div>
</div>
<div id="publicModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">x</button>
                <h2 class="text-left text-primary">公告XXXX</h2>
            </div>
            <div class="modal-body">
                djklhflkjadghjgkdghlfkjhldkjahgdlkjafhsajkfhakljgasdfkljvadhfsjhkfjsa
                asdadsdfdfsjagdjskjagdasfshfgakhgshf
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="confirmInvite">关闭</button>
            </div>
        </div>
    </div>
</div>
