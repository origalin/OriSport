<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/28
 * Time: 19:43
 */
?>
</head>
<body role="document">
<nav class="navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">OriSport</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/personal/sport_data">我的oriSport</a></li>
                <li><a href="/race/my_races">竞赛</a></li>
                <li><a href="/club/my_clubs">运动俱乐部</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" id="mesSpan"><a href="#"
                                                     class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                     aria-haspopup="true" aria-expanded="false"><img class="portrait" src="<?=$_SESSION['portrait']?>"><?php echo $_SESSION['username']?><span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a  href="/user/user_message">我的消息 </a></li>
                        <li><a  href="/user/user_data">我的资料</a></li>
                        <?php
                        if($_SESSION['role']=='manager'){
                            ?>
                            <li><a  href="/manage/user_manage">管理员</a></li>
                        <?php
                        }
                        ?>

                        <li role="separator" class="divider"></li>
                        <li><a href="/sign/logout" style="cursor: pointer;">登出</a></li>
                    </ul></li>
            </ul>
        </div>

    </div>
</nav>
<article class="container">
