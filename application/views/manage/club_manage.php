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
            <input id="searchClub" name="searchClub" class="form-control" oninput="searchClub()">
        </div>
    </div>
    <div class="row pageInner">
        <table class="table table-hover">
            <thead>
            <th>
                俱乐部名
            </th>
            <th>
                创建日期
            </th>
            <th>
                人数
            </th>
            </thead>
            <tbody id="clubTb">
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
