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
            <form class="form form-signin" action="/sign/account/verifying" method="post" id="signin">
                <div class="form-group">
                    <input class="form-control" name="username" placeholder="用户名" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" type="password" placeholder="密码" required>
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" name="" type="submit" value="sign in" >
                </div>
            </form>
            <form class="form form-signup" action="/sign//account/registration" method="post" id="signup">
                <div class="form-group">
                    <input class="form-control" name="username" placeholder="用户名" required>
                </div>
                <div class="form-group">
                    <input class="form-control" id="password" name="password" type="password" placeholder="密码" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="repeat-password" type="password" placeholder="重复密码" equalTo="#password" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-inline" name="height" type="number" placeholder="身高" required>
                    <input class="form-control input-inline" name="weight" type="number" placeholder="体重" required>
                    <input class="form-control input-inline" name="step_length" type="number" placeholder="步长" required>
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" name="" type="submit" value="sign up">
                </div>
            </form>
            <a>没有帐号？sign up!</a>
        </div>
    </section>
