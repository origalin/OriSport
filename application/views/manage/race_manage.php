<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/17
 * Time: 20:45
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <div class="col-md-1 searchLabel"><label for="searchUser">搜索：</label></div>
        <div class="col-md-11">
            <input id="searchRace" name="searchRace" class="form-control" oninput="searchRace()">
        </div>
    </div>
    <div class="row pageInner">
        <table class="table table-hover">
            <thead>
            <th>
                比赛名
            </th>
            <th>
                创建时间
            </th>
            <th>
                当前状态
            </th>
            </thead>
            <tbody id="raceTb">
            <tr>
                <td>
                </td>
                <td>
                    输入名称以搜索
                </td>
                <td>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
