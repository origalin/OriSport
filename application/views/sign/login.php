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
            <form class="form form-signin" action="/sign/sign_in" method="post">
                <div class="form-group">
                    <input class="form-control input-lg" name="username" placeholder="用户名">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" name="password" type="password" placeholder="密码">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" name="" type="submit" value="sign in">
                </div>
            </form>
            <form class="form form-signup" action="/sign/regist" method="post">
                <div class="form-group">
                    <input class="form-control input-lg" name="username" placeholder="用户名">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" name="email" type="email" placeholder="邮箱">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" name="password" type="password" placeholder="密码">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" name="repeat-password" type="password" placeholder="重复密码">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" name="" type="submit" value="sign up">
                </div>
            </form>
            <a>没有帐号？sign up!</a>
        </div>
    </section>
