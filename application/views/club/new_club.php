<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 19:36
 */
?>

<div class="col-md-10 inPage">
    <div class="row pageInner">
        <button onclick="history.go(-1);" class="btn btn-success">返回</button>
    </div>
    <div class="row pageInner">
        <div class="col-md-12">

            <form class="form-horizontal" action="/club/clubList" method="post" id="newCLub">
                <div class="form-group ">
                    <label for="name" class="col-sm-2 control-label">俱乐部名称</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="name"
                               value="" required>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="province" class="col-sm-2 control-label">俱乐部城市</label>
                    <div class="col-md-6 col-xs-8 select">
                        <select class="province cxselect form-control"
                                data-first-title="选择省" title="province" id="province" name="province" required></select>
                        <select class="city cxselect form-control"
                                data-first-title="选择市" title="city" id="city" name="city" required></select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="type" class="col-sm-2 control-label">俱乐部类型</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="type" name="type" required>
                            <option value="1" style="color: #b6b6b6" disabled selected>-选择类型-</option>
                            <?php
                            foreach($clubTypes as $value){
                                ?>
                                <option><?=$value?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="description" class="col-sm-2 control-label" >俱乐部介绍</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-success pull-right">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>



