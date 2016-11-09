<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/28
 * Time: 19:41
 */
?>
    <section class="mainpic">
        <div class="sign col-md-4  sectionColor">
            <span class="icon"></span>
            <form class="form form-signin" action="/sign/account/verifying" method="post">
                <div class="form-group">
                    <input class="form-control" name="username" placeholder="用户名">
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" type="password" placeholder="密码">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" name="" type="submit" value="sign in">
                </div>
            </form>
            <form class="form form-signup" action="/sign//account/registration" method="post">
                <div class="form-group">
                    <input class="form-control" name="username" placeholder="用户名">
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" type="password" placeholder="密码">
                </div>
                <div class="form-group">
                    <input class="form-control" name="repeat-password" type="password" placeholder="重复密码">
                </div>
                <div class="form-group">
                    <input class="form-control input-inline" name="height" placeholder="身高">
                    <input class="form-control input-inline" name="weight" placeholder="体重">
                    <input class="form-control input-inline" name="step_length" placeholder="步长">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" name="" type="submit" value="sign up">
                </div>
            </form>
            <a>没有帐号？sign up!</a>
        </div>
    </section>
