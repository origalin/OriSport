<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 20:37
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <h4>过去7天内，你的运动时间为<span class="bNums"><?= floor($sportTrack['totalTime'] / 60) ?></span>小时<span
                class="bNums"><?= $sportTrack['totalTime'] % 60 ?></span>分钟，其中：</h4>
    </div>
    <div class="row pageInner result">
        <div class="col-md-4">
            <span class="sport-light disp"></span>
            <p>轻微运动<br><span class="bNums"><?= floor($sportTrack['slowTime'] / 60) ?></span>小时<span
                    class="bNums"><?= $sportTrack['slowTime'] % 60 ?></span>分钟</p>
        </div>
        <div class="col-md-4">
            <span class="sport-middle disp"></span>
            <p>适度运动<br><span class="bNums"><?= floor($sportTrack['fastTime'] / 60) ?></span>小时<span
                    class="bNums"><?= $sportTrack['fastTime'] % 60 ?></span>分钟</p>
        </div>
        <div class="col-md-4">
            <span class="sport-heavy disp"></span>
            <p>剧烈运动<br><span class="bNums"><?= floor($sportTrack['rideTime'] / 60) ?></span>小时<span
                    class="bNums"><?= $sportTrack['rideTime'] % 60 ?></span>分钟</p>
        </div>
    </div>
    <div class="row pageInner result">
        <span class="sportJudge disp-lg"></span>
        <p>您不觉得累吗？？？</p>
    </div>
    <div class="row pageInner">
        <h3>以下是你近期的运动记录</h3>
        <table class="table">
            <thead>
            <tr>
                <td>
                    开始时间
                </td>
                <td>
                    持续时间
                </td>
                <td>
                    运动类型
                </td>
                <td>
                    移动距离
                </td>
                <td>
                    消耗卡路里
                </td>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($sportTrack['trackTb']) == 0) {
                echo '<tr ><td colspan = \'5\' style="text-align: center">暂无</td></tr>';
            } else {
                foreach ($sportTrack['trackTb'] as $value) { ?>
                    <tr>
                        <td>
                            <?=$value['time']?>
                        </td>
                        <td>
                            <?=$value['length']?>分钟
                        </td>
                        <td>
                            <?php switch ($value['type']){
                                case 'slow':
                                    echo '慢跑/缓和运动';
                                    break;
                                case 'fast':
                                    echo '快跑/剧烈运动';
                                    break;
                                case 'ride':
                                    echo '骑行';
                                    break;
                                default:
                                    break;
                            }?>
                        </td>
                        <td>
                            <?=$value['distance']?>m
                        </td>
                        <td>
                            <?=$value['calorie']?>
                        </td>
                    </tr>
                <?php }
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
