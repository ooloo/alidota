<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

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

  .container {
    width: auto;
  }

</STYLE>
<?php include_once("analyticstracking.php") ?>
</head>

<body>


<div class="container">

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
<li class="active"><a href="http://alidota.cn/index.php">Home</a></li>
<li><a href="http://alidota.cn/matches.php">Matches</a></li>
<li><a href="http://alidota.cn/about.php">About</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>

<br><BR><BR>

<?php
    include "count.php";
    include "stat.php";
    include "items_name.php";
    include "items_cost.php";

    $page_hero_num = 0;
    $page_show_num = 0;
    foreach($count as $hero => $summary)
    {
        if($page_hero_num%10 == 0)
        {
            $top1 = $page_hero_num + 1;
            $top10 = $page_hero_num + 10;
            echo "<div class=\"panel panel-primary\">";
            echo "<div class=\"panel-heading\">职业联赛热门英雄Top$top1-$top10</div>\n";
            echo "<ul class=\"list-group\">\n";
            echo "<li class=\"list-group-item\">\n";
            echo "<table class=\"table\">";
            echo "<tr><th width=20%>Heroes</th><th width=20%>WinLose</th><th width=20%>Pick</th>";
            echo "<th width=10%>KDA</th><th width=30%>本周热门装备</th></tr>";
        }

        $picknum = $summary["all"];
        $w = $summary["w"];
        $l = $summary["l"];
        $k = $summary["k"];
        $d = $summary["d"];
        $a = $summary["a"];

        $wr = $w/$picknum * 100;
        $wr = round($wr, 0);

        $kda = ($k+$a)/$d;
        $kda = round($kda, 2);

        $show_num = 0;
        $item_num = "";
        $item_arr = $stat["$hero"];
        echo "<tr><td>";
        echo "<img src='http://cdn.dota2.com/apps/dota2/images/heroes/${hero}_sb.png' width='52'/></td>\n";
        echo "<td>$w-$l</td>";
        echo "<td>$wr%</td>";
        echo "<td>$kda</td>";
        
        $item_list = "<table class='table'><tr>";
        foreach($item_arr as $itemid => $usenum)
        {
            if($show_num >= 12)
                break;
            $name = $items_name["$itemid"];
            $price = $items_cost["$itemid"];
            if(!empty($price) && $price > 800)
            {
                //echo "<img src='http://media.steampowered.com/apps/dota2/images/items/{$t}_lg.png' ";
                $img = "http://media.steampowered.com/apps/dota2/images/items/{$name}_lg.png";
                //echo "<img src='http://media.steampowered.com/apps/dota2/images/items/{$t}_lg.png' ";
                //echo "<img src='http://cdn.dota2.com/apps/dota2/images/items/{$img}' ";
                //echo "width='33%' style='margin-right:2px'/> \n";
                $item_list =  "$item_list<td><img src='{$img}' width='47'/></td>";
                if($item_num == "")
                    $item_num = "$usenum";
                else
                    $item_num = "$item_num/$usenum";
                $show_num++;
            }

            if($show_num%4 == 0)
            {
                $item_list = "$item_list</tr><tr>";
            }
        }
        $item_list = "$item_list</tr></table>";

        echo "<td>";
        echo "<button type=\"button\" class=\"btn btn-success\" title=\"<b>热门装备</b>\" 
            data-container=\"body\" data-toggle=\"popover\" data-placement=\"left\" 
            data-backdrop=\"static\" data-content=\"$item_list\">点我</button>";
        echo "</td></tr>";
        
        $page_show_num++;
        $page_hero_num++;
        if($page_show_num == 10)
        {
            $page_show_num = 0;
            echo "</table>";
            echo "</li></ul></div>\n";
        }
    }

    if($page_show_num != 0)
    {
        echo "</table>";
        echo "</li></ul></div>\n";
    }

    // -------------left end--------------
    
    include "right.php";
    // ------------right end--------------

?>

<script>
$(function () { 
    $("[data-toggle='popover']").popover({html: true, trigger: 'hover'});
});
</script>

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
