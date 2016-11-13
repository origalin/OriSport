<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/13
 * Time: 23:31
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <div class="row">
            <img src="" alt="Responsive image" width="200px" height="200px">
        </div>
        <h2><?= $userData['username'] ?></h2>
    </div>
    <div id="bodyData" class="row pageInner">
        <div class="editTool editTool-sp">
            <button onclick="startBodyEdit(this)" class="glyphicon glyphicon-edit"></button>
        </div>

        <div>
            <p>身高：<span class="mayHide"><?= $userData['height'] ?></span><input class="form-control input-sm mayChange">cm
            </p>
        </div>
        <div>
            <p>体重：<span class="mayHide"><?= $userData['weight'] ?></span><input class="form-control input-sm mayChange">kg
            </p>
        </div>
        <div>
            <p>步长：<span class="mayHide"><?= $userData['step_length'] ?></span><input
                    class="form-control input-sm mayChange">cm</p>
        </div>
    </div>
    <div id="contactData" class="row pageInner">
        <div class="editTool editTool-sp">
            <button onclick="startContactEdit(this)" class="glyphicon glyphicon-edit"></button>
        </div>
        <div>
            <p><span>城市：</span><span class="mayHide"><?= $userData['city']==''?'-':$userData['province'].' '.$userData['city'] ?></span>
                <span class="select mayChange">
                    <select class="province cxselect cxselect-sm form-control"
                            data-first-title="选择省" title="province">
                    </select>
                    <select class="city cxselect cxselect-sm form-control"
                            data-first-title="选择市" title="city">
                    </select>
                </span>
            </p>
        </div>
        <div>
            <p>手机：<span class="mayHide"><?= $userData['phone']==''?'-':$userData['phone']?></span><input class="form-control input-sm mayChange"></p>
        </div>
        <div>
            <p>邮箱：<span class="mayHide"><?= $userData['email']==''?'-':$userData['email']?></span><input class="form-control input-sm mayChange"></p>
        </div>
        <div>
            <p>爱好：<span class="mayHide"><?= $userData['hobby']==''?'-':$userData['hobby']?></span><input class="form-control input-sm mayChange"></p>
        </div>
        <div style="display: flex">
            <span>个人签名：<span class="mayHide"><?= $userData['description']==''?'-':$userData['description']?></span></span><textarea
                class="form-control input-sm mayChange"></textarea>
        </div>
    </div>

</div>