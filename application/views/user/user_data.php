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
            <div id="crop-avatar" class="col-md-6">
                <div data-original-title="Change Logo Picture" class="avatar-view" title="">
                    <img src="<?= $userData['portrait'] ?>" alt="Logo">
                </div>
            </div>
        </div>
        <h2><?= $userData['username'] ?></h2>
        <p>积分：<?= $userData['point'] ?></p>
    </div>
    <div id="bodyData" class="row pageInner">
        <div class="editTool editTool-sp">
            <button onclick="startBodyEdit(this)" class="glyphicon glyphicon-edit"></button>
        </div>

        <div>
            <p>身高：<span class="mayHide" id="height_h"><?= $userData['height'] ?></span><input
                    class="form-control input-sm mayChange" name="height" id="height">cm
            </p>
        </div>
        <div>
            <p>体重：<span class="mayHide" id="weight_h"><?= $userData['weight'] ?></span><input
                    class="form-control input-sm mayChange" name="weight" id="weight">kg
            </p>
        </div>
        <div>
            <p>步长：<span class="mayHide" id="step_length_h"><?= $userData['step_length'] ?></span><input
                    class="form-control input-sm mayChange" name="step_length" id="step_length">cm</p>
        </div>
    </div>
    <div id="contactData" class="row pageInner">
        <div class="editTool editTool-sp">
            <button onclick="startContactEdit(this)" class="glyphicon glyphicon-edit"></button>
        </div>
        <div>
            <p><span>城市：</span><span class="mayHide"
                                     id="place_h"><?= $userData['city'] == '' ? '-' : $userData['province'] . ' ' . $userData['city'] ?></span>
                <span class="select mayChange">
                    <select class="province cxselect cxselect-sm form-control"
                            data-first-title="选择省" title="province" id="province">
                    </select>
                    <select class="city cxselect cxselect-sm form-control"
                            data-first-title="选择市" title="city" id="city">
                    </select>
                </span>
            </p>
        </div>
        <div>
            <p>手机：<span class="mayHide"
                        id="phone_h"><?= $userData['phone'] == '' ? '-' : $userData['phone'] ?></span><input
                    class="form-control input-sm mayChange" id="phone"></p>
        </div>
        <div>
            <p>邮箱：<span class="mayHide"
                        id="email_h"><?= $userData['email'] == '' ? '-' : $userData['email'] ?></span><input
                    class="form-control input-sm mayChange" id="email"></p>
        </div>
        <div>
            <p>爱好：<span class="mayHide"
                        id="hobby_h"><?= $userData['hobby'] == '' ? '-' : $userData['hobby'] ?></span><input
                    class="form-control input-sm mayChange" id="hobby"></p>
        </div>
        <div style="display: flex">
            <span>个人签名：<span class="mayHide"
                             id="description_h"><?= $userData['description'] == '' ? '-' : $userData['description'] ?></span></span><textarea
                class="form-control input-sm mayChange" id="description"></textarea>
        </div>
    </div>
    <div class="row pageInner">
        <h4>关注用户</h4>
        <?php
        if (count($userData['watchData']) == 0) {
            echo '<p style="text-align: center">您没有关注的用户</p>';
        } else {
            foreach ($userData['watchData'] as $value) {
                ?>
                <div class="col-md-3"><a href="/people/his_data/<?=$value['watchid']?>"><img class="portrait" src="<?=$value['watchportrait']?>"><?=$value['watchname']?></a></div>
                <?php
            }
        }
        ?>
    </div>
    <div style="display: none;" class="modal fade" id="avatar-modal" aria-hidden="true"
         aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" action="/user/portrait" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button">×</button>
                        <h4 class="modal-title" id="avatar-modal-label">Change Logo Picture</h4>
                    </div>
                    <div class="modal-body">
                        <div class="avatar-body">
                            <div class="avatar-upload">
                                <input class="avatar-src" name="avatar_src" type="hidden">
                                <input class="avatar-data" name="avatar_data" type="hidden">
                                <label for="avatarInput">图片上传</label>
                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file"></div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="avatar-wrapper"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="avatar-preview preview-lg"><img src="<?= $userData['portrait'] ?>">
                                    </div>
                                    <div class="avatar-preview preview-md"><img src="<?= $userData['portrait'] ?>">
                                    </div>
                                    <div class="avatar-preview preview-sm"><img src="<?= $userData['portrait'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row avatar-btns">
                                <div class="col-md-9">
                                    <div class="btn-group">
                                        <button class="btn" data-method="rotate" data-option="-90" type="button"
                                                title="Rotate -90 degrees"><i class="fa fa-undo"></i> 向左旋转
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn" data-method="rotate" data-option="90" type="button"
                                                title="Rotate 90 degrees"><i class="fa fa-repeat"></i> 向右旋转
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-success btn-block avatar-save" type="submit"><i
                                            class="fa fa-save"></i> 保存修改
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
</div>