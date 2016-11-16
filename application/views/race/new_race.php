<div class="col-md-10 inPage">
    <div class="row pageInner">
        <button onclick="window.location.href = document.referrer" class="btn btn-success">返回</button>
    </div>
    <div class="row pageInner">
        <div class="col-md-12">

            <form class="form-horizontal" action="/race/raceList" method="post">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">竞赛名称</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name"
                               value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">竞赛城市</label>
                    <div class="col-md-4 select">
                        <select class="province cxselect form-control"
                                data-first-title="选择省" title="province" name="province" id="province"></select>
                        <select class="city cxselect form-control"
                                data-first-title="选择市" title="city" name="city" id="city"></select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-sm-2 control-label">地址</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="location" name="location"
                               value="">
                    </div>
                </div>
               <div class="form-group">
                    <label for="starttime" class="col-sm-2 control-label">开始时间</label>
                    <div class="col-sm-4">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" id="starttime" name="starttime"/> <span
                                class="input-group-addon"> <span
                                    class="glyphicon glyphicon-calendar"></span>
						</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-2 control-label">竞赛类型</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="type" name="type">
                            <option value="1" style="color: #b6b6b6" disabled selected>-选择类型-</option>
                            <?php
                            foreach($raceTypes as $value){
                                ?>
                                <option><?=$value?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="reward" class="col-sm-2 control-label">奖励</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reward" name="reward"
                               value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 control-label">补充说明</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-success pull-right">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>



