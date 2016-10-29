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
        <h2>origalin</h2>
    </div>
    <div id="bodyData" class="row pageInner">
        <div class="editTool editTool-sp">
            <button onclick="startBodyEdit(this)" class="glyphicon glyphicon-edit"></button>
        </div>

        <div>
            <p>身高：<span class="mayHide">178</span><input class="form-control input-sm mayChange">cm</p>
        </div>
        <div>
            <p>体重：<span class="mayHide">75</span><input class="form-control input-sm mayChange">kg</p>
        </div>
        <div>
            <p>步长：<span class="mayHide">70</span><input class="form-control input-sm mayChange">cm</p>
        </div>
    </div>
    <div id="contactData" class="row pageInner">
        <div class="editTool editTool-sp">
            <button onclick="startContactEdit(this)" class="glyphicon glyphicon-edit"></button>
        </div>
        <div>
            <p><span class="mayHide">广西 桂林</span>
            <div class="selectCity mayChange">
                <span>城市：</span>
                <select class="province cxselect cxselect-sm form-control"
                        data-first-title="选择省" title="province"></select>
                <select class="city cxselect cxselect-sm form-control"
                        data-first-title="选择市" title="city"></select>
            </div>
            <script src="/script/js/jquery.cxselect.min.js"></script>
            <script>
                $.cxSelect.defaults.url = '/scrips/json/cityData.min.json';
                $('.selectCity').cxSelect({
                    selects : [ 'province', 'city' ],
                    nodata : 'none'
                });
            </script></p>
        </div>
        <div>
            <p>手机：<span class="mayHide">15905190118</span><input class="form-control input-sm mayChange"></p>
        </div>
        <div>
            <p>邮箱：<span class="mayHide">2360436350@qq.com</span><input class="form-control input-sm mayChange"></p>
        </div>
        <div>
            <p>爱好：<span class="mayHide">跑步</span><input class="form-control input-sm mayChange"></p>
        </div>
        <div style="display: flex">
            <span>个人签名：<span class="mayHide">hahahahahaha</span></span><textarea class="form-control input-sm mayChange"></textarea>
        </div>
    </div>

</div>