<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.6.2/html5shiv.js"></script>
<script src="js/respond.src.js"></script>
<![endif]-->

<meta charset="utf-8">
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">

<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>DOTA2 职业联赛</title>

<STYLE>

.container { width: auto;}

</STYLE>
<?php include_once("analyticstracking.php") ?>
</head>

<body>
<div class="container">

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="">DOTA2 职业联赛</a>
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="http://alidota.cn/index.php">Home</a></li>
<li><a href="http://alidota.cn/matches.php">Match</a></li>
<li><a href="http://alidota.cn/player.php">Team</a></li>
<li class="active"><a href="http://alidota.cn/about.php">About</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>

<?php
    echo "<br><BR><BR>";

    echo "<div class=\"panel panel-primary\">";
    echo "<div class=\"panel-heading\">官方更新日志传送门</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul><li><a href='http://www.dota2.com.cn/news/gamepost/news_update/index.htm' target='_blank'>官方更新日志传送门</a></li></ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">4月30日更新日志:6.87b平衡性改动</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul>
    <li>修复飓风长戟和矮人直升机的追踪导弹之间的相互作用</li>
    <li>修复房间内只能显示4个解说频道而不是6个的问题</li>
    <li>修复天穹守望者的风暴双雄在重连游戏后的热键问题</li>
    <li>牺牲（巫妖）的冷却时间从44/36/28/20秒增加至60/50/40/30秒</li>
    <li>牺牲（巫妖）的魔法恢复量从25/40/55/70%增加至30/50/70/90%</li>
    <li>刃甲的冷却时间从13秒增加至18秒</li>
    <li>忍术（赏金猎人）的减速效果从25/27/29/31%降低至18/22/26/30%</li>
    <li>臂章的护甲加成现在会在完全启动后提供</ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">4月26日更新日志: 6.87 游戏性更新</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul><li><a href='http://www.dota2.com.cn/687/' target='_blank'>
        http://www.dota2.com.cn/687/</a></li></ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">1月22日更新日志：修复视角居中问题</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul><li>1月22日更新日志：修复双击快捷键不会使视角居中的问题</li></ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">1月21日更新日志：推出6.86d平衡性改动</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul>
    <li>现在天穹守望者的风暴双雄复制体击杀敌方英雄后本体会获得相应的经验</li>
    <li>修正陈的神圣劝化和噬魂鬼的感染之间的相互作用</li>
    <li>修复双击2级远行鞋会传送至离泉水最近友方英雄而不是泉水的问题</li>
    <li>以太之镜的配方中抗魔斗篷替换为550金的图纸（不再提供魔法抗性加成）</li>
    <li>陈装备阿哈利姆神杖后不再减少上帝之手的冷却时间</li>
    <li>祈求者的基础敏捷从20减少至14</li>
    </ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">1月19日更新日志：队长征召模式选人时间增加</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul>
    <li>队长征召（CD）模式的每个队伍总选人时间从150秒增加至180秒</li>
    <li>修复大地之灵的巨石冲击不以单位为目标的问题</li></ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">1月15日更新日志：商城推出全新套装</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul>
    <li>修复神谕者相关的天梯匹配漏洞。利用漏洞的玩家将重新回到校准比赛阶段。</li>
    <li>修复战争迷雾中单位身上的粒子特效位置出错的问题</li>
    </ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">1月14日更新日志：修复玩家昵称会被替换的问题</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul>
    <li>修复物品详情页面不显示对应联赛当前总奖金的问题</li>
    <li>修正了战争迷雾的渲染效果，现在显示极小视野时能正确显示其范围</li>
    <li>现在树之祭祀和守卫不再能分享给幻象</li>
    <li>修复银月之晶吞掉后不计入财产总和的问题</li>
    <li>修复玩家昵称会被游戏内文本替代的问题</li>
    </ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">12月29日更新日志：6.86c平衡性更新</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul>
    <li>祈求者：灵动迅捷的攻击力/攻速从30/40/50/60/70/80/90调整为10/25/40/55/70/85/100</li>
    <li>祈求者：基础力量减少2点</li>
    <li>虚空假面：时间漫游的施法距离从550提高至625</li>
    <li>虚空假面：力量成长从1.6提高至1.8</li>
    <li>虚空假面：时间膨胀的持续时间从5.5/7/8.5/10秒提高至6/8/10/12秒</li>
    <li>虚空假面：时间膨胀的冷却时间从34/28/22/16秒增加至36/30/24/18秒</li>
    <li>矮人直升机：召唤飞弹第一枚导弹的伤害从220/285/350点减少至200/275/350点</li>
    <li>巨牙海民：海象神拳的冷却时间从20/16/12秒增加至36/24/12秒</li>
    <li>祸乱之源：噩梦的冷却时间从16/15/14/13秒增加至22/19/16/13秒</li>
    <li>力丸：绝杀秘技的冷却时间从70秒降低至40秒</li>
    <li>力丸：绝杀秘技的作用范围从475提高至500</li>
    <li>力丸：闪烁突袭的施法距离从700提高至800</li>
    <li>力丸：闪烁突袭的施法前摇从0.4秒降低至0.3秒</li>
    <li>殁境神蚀者：奥术天球的智力偷取从1/2/3/4提高至2/3/4/5</li>
    <li>殁境神蚀者：奥术天球的智力偷取持续时间从40秒提高至50秒</li>
    <li>戴泽：薄葬的施法前摇从0.35秒增加至0.4秒</li>
    <li>戴泽：暗影波的魔法消耗从80/90/100/110点增加至90/100/110/120点</li>
    <li>寒冬飞龙：寒冬诅咒的攻速加成从50提高至70</li>
    <li>不朽尸王：墓碑的冷却时间从60秒增加至70秒</li>
    <li>黑暗贤者：奔腾的魔法消耗从20/30/40/50点增加至50点</li>
    <li>死亡先知：基础智力提高3点</li>
    <li>死亡先知：吸魂巫术的最大生命值吸取从1/1.8/2.6/3.4%提高至1/2/3/4%</li>
    <li>死亡先知：吸魂巫术的减速从6/10/14/18%平衡为5/10/15/20%</li>
    <li>死亡先知：驱使恶灵的持续时间从30秒提高至35秒</li>
    <li>天辉小野点的刷新范围判定现在缩小一些</li>
    <li>修复德鲁伊升级变形术的时候血量没有增加的问题</li>
    </ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">12月21日更新日志：6.86b平衡性更新</div>";
    echo "<div class=\"panel-body\">";
    echo "<ul>
    <li>末日使者、虚空假面、死亡先知、德鲁伊和寒冬飞龙已回归队长模式</li>
    <li>奥术神符的魔法消耗减少从50%降低至40%</li>
    <li>吸魂巫术的持续时间从4秒增加至5秒</li>
    <li>奥术天球的窃取智力从0/1/2/3点增加至1/2/3/4点</li>
    <li>星体禁锢的冷却时间从20/17/14/11秒平衡为22/18/14/10秒</li>
    <li>刀光谍影（原永久隐身）的背刺伤害系数从0.4/0.6/0.8/1.0增加至0.5/0.75/1.0/1.25</li>
    <li>绝杀秘技现在只作用于英雄</li>
    <li>绝杀秘技的作用范围从450增加至475</li>
    <li>绝杀秘技的冷却时间从90/80/70秒平衡为70秒</li>
    <li>时间膨胀的作用范围从650增加至725</li>
    <li>时间膨胀的减速效果从4/6/8/10%平衡为7/8/9/10%</li>
    <li>时间膨胀的持续时间从6/7/8/9平衡为5.5/7/8.5/10秒</li>
    <li>神杖升级的肉钩伤害从175/275/375/475点减少至180/270/360/450点</li>
    </ul>";
    echo "</div></div>";

    echo "<div class=\"panel panel-info\">";
    echo "<div class=\"panel-heading\">12月21日更新日志：6.86版本更新日志</div>";
    echo "<div class=\"panel-body\">

    <h3>综合</h3>
    <ul>
    <li>小兵的金钱奖励每次升级后都会增加1金钱即每7分30秒</span></li>
    </ul>
    <ul>
    <li>英雄所受的攻城伤害从75%上升至85%防御塔和攻城单位对英雄的伤害提升约13%。例如，1级防御塔对英雄的伤害从82.5点上升至93.5点。</span></li>
    </ul>
    <ul>
    <li>英雄的基础生命值从150点上升至180点</li>
    </ul>
    <ul>
    <li>现在兵线的位置略微靠近夜魇上塔和天辉下塔</li>
    </ul>
    <ul>
    <li>随机征召（RD）的初始英雄数量从24个增加至50个</li>
    <li>随机征召模式加入天梯匹配</li>
    <li>现在随机征召的选人机制与天梯全英雄选择相同</li>
    </ul>
    <ul>
    <li>半人马猎手现在拥有一个可以叠加的魔法抗性光环（普通单位20%，英雄5%）这是半人马营地中较小的单位。</span></li>
    <li>地狱熊怪现在拥有一个可以叠加的魔法抗性光环（普通单位20%，英雄5%）这是地狱熊怪营地中较小的单位。</span></li>
    <li>龙隐光环的护甲加成从2点增加至3点</li>
    <li>远古黑龙堆的护甲减少1点</li>
    <li>现在远古中立生物与普通中立生物类似，死亡时范围内所有英雄平分经验</li>
    </ul>
    <ul>
    <li>远古黑龙增加一个新技能，火球
    <p>以一片区域为目标吐出一个火球，点燃300范围内区域，持续10秒。每秒造成85点伤害。</p>
    <p>冷却时间：10秒<br />魔法消耗：100点<br />施法距离：1000。</p></li>
    </ul>
    <ul>
    <li>远古雷隐兽的暴怒现在以单位为目标</li>
    <li>丘陵巨魔巫师的魔法光环从2点/秒增加至3点/秒</li>
    <li>萨特放逐者的净化冷却时间从5秒减少至3秒</li>
    <li>萨特苦难使者的邪恶光环生命恢复从4点/秒增加至6点/秒</li>
    <li>萨特苦难使者的冲击波距离从800增加至1200</li>
    <li>萨特苦难使者的冲击波速度从1050减少至900</li>
    <li>萨特苦难使者的冲击波伤害从125点增加至160点</li>
    <li>黑暗巨魔召唤法师和丘陵巨魔的攻击距离从500降低至400</li>
    <li>黑暗巨魔召唤法师的攻击力增加6点</li>
    </ul>
    <ul>
    <li>Roshan的基础护甲增加1点</li>
    <li>Roshan的基础攻击间隔从1.0增加至2.0</li>
    <li>Roshan现在拥有+100攻击速度的加成效果
    
    他的攻击频率保持不变，但是攻速降低效果的作用将会变小。
    </span>
    </li>
    </ul>
    <ul>
    <li>增加巡逻指令</li>
    <li>现在被沉默后还是会呼出选定目标的指示框，而且会在选好目标时收到错误提示，而不是点击技能时</li>
    <li>现在拥有范围效果的单个目标类技能拥有全新的选定界面
    
    如寒霜爆发（巫妖）、风暴之拳（斯温）等等
    </span>
    </li>
    </ul>
    <ul>
    <li>天梯全英雄选择的初始预选时间从15秒减少至5秒</li>
    <li>防御塔被摧毁后不再提供经验奖励（之前区域内平分25经验）</li>
    </ul>
    <ul>
    <li>简化部分伤害和护甲类型
    <p>移除穿刺攻击类型，下列单位变成标准攻击类型（对建筑造成的伤害从40->50%）：半人马征服者，地狱熊怪，地狱熊怪粉碎者，枭兽撕裂者，萨特苦难使者，远古花岗岩傀儡，远古黑龙，熔炉精灵，小蜘蛛和术士的地狱火。</p>
    <p>移除无甲护甲类型，下列单位变成轻甲类型（与小兵相同）：兽王的战鹰</p>
    <p>中甲和重甲统一为相同类型（与其他中立生物相同）：狗头人士兵，豺狼人刺客，鬼魂，丘陵巨魔狂战士，丘陵巨魔牧师，鹰身女妖侦察者，鹰身女妖风暴巫师，豪猪（兽王），的墓碑（不朽尸王），幽冥守卫（帕格纳），灵能陷阱（圣堂刺客），地雷（工程师），麻痹陷阱（工程师），遥控炸弹（工程师）。</p>

    </li>
    </ul>

    <br />
    <h3>地形</h3>
    <ul>
    <li>双方各加入一组大型中立生物营地，靠近各自的神秘商店</li>
    <li>天辉的神秘商店上方的眼位处加入一个小斜坡</li>
    <li>天辉的大型中立生物营地现在更靠近夜魇的劣势路</li>
    <li>天辉野区的中型和大型中立生物营地互换位置</li>
    <li>天辉中路增加一条进入天辉野区的小路</li>
    <li>天辉野区增加一个连接至Roshan附近区域的斜坡</li>
    <li>增加一个通往天辉符点眼位的小路</li>
    <li>夜魇神秘商店后方增加一个新的绕树林点</li>
    <li>扩张了天辉上路二塔周围的地形</li>
    <li>下路符点略微上移</li>
    <li>天辉中路一塔稍微后移</li>
    <li>调整了天辉小型中立生物营地的刷新判定范围</li>
    <li>天辉远古生物营地附近增加一处新眼位（没有上路符点视野）</li>
    <li>增加一条通往天辉神秘商店下方眼位的小路</li>
    <li>天辉方通往上路符点的斜坡现在离符点更远了（更靠近中路）</li>
    <li>夜魇方通往上路符点的斜坡现在更靠上</li>
    <li>略微调整了天辉远古生物营地下方的地形和斜坡</li>
    <li>提升夜魇边路商店周围地形的绕树林效果</li>
    <li>天辉劣势路边路商店以南的树林中增加一条小路以及绕树林的路径</li>
    <li>天辉上路一塔右侧增加一处新眼位</li>
    <li>天辉远古生物下方斜坡右侧增加若干树木（可以遮住左侧的部分视野）</li>
    <li>夜魇现在可以通过中路天辉斜坡进入野区，靠边走不会驱散诡计之雾效果</li>
    <li>夜魇上路边路商店上方增加一条新的小路</li>
    <li>天辉下路二塔区域的长长一片树林中加入一条新的小路</li>
    <li>下路符点眼位附近增加一条可以通过的小路</li>
    <li>夜魇优势路大型中立生物营地的拉野范围减少</li>
    <li>夜魇上路符点上方悬崖处增加一条通往右侧的小路</li>
    <li>下路边路商店以南加入一条新的小路</li>
    <li>夜魇基地的中塔和上塔之间沿岩架增加若干树木</li>
    <li>调整了天辉大型中立生物营地附近眼位的绕树林点</li>
    <li>天辉下路大型中立生物营地的南部增加一个新的绕树林点</li>
    <li>夜魇中路靠近神秘商店边缘处增加一个新的藏身地点</li>
    <li>天辉上路二塔下方增加一些树木</li>
    <li>调整了夜魇劣势路左侧的树林（影响的是能否看见英雄从左侧树林出现）</li>
    <li>天辉远古中立生物营地上方增加一条小路（通往新眼位）</li>
    <li>微调了夜魇神秘商店的位置</li>
    <li>调整了天辉下路左侧眼位附近环路的寻路行为</li>
    <li>调整了天辉中型中立生物营地右侧高地的树木布局</li>
    <li>天辉方通向下路符点的斜坡往回移了一点</li>
    <li>原天辉大型中立生物营地（现天辉中型中立生物营地）上方的树丛增加了藏身地点</li>
    <li>天辉小型中立生物营地微微下移</li>
    <li>天辉中路中型中立生物营地略微下移，并调整了周围的树木</li>
    <li>夜魇下路，远古中立生物营地右侧高地上增加了一处新的藏身地点</li>
    <li>略微调整了天辉中路斜坡的位置</li>
    <li>天辉小型中立生物营地右侧的地形加入新的绕树林点</li>
    <li>夜魇上路二塔上方调整了树林中的小路，增加了若干藏身地点</li>
    </ul>";

    echo "</div></div>";

    // -------------left end--------------

    include "right.php";
?>

<script>
//通过touchstart和touchend
window.onload=function () {  
    document.addEventListener('touchstart',function (event) {  
            if(event.touches.length>1){  
            event.preventDefault();  //阻止元素的默认行为
            }  
            })  
    var lastTouchEnd=0;  
    document.addEventListener('touchend',function (event) {  
            var now=(new Date()).getTime();  
            if(now-lastTouchEnd<=300){  
            event.preventDefault();  
            }  
            lastTouchEnd=now;  //当前为最后一次触摸
            },false)  
}
</script>

</div>
</body>
</html>
