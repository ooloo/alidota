<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0">

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
<li class="active"><a href="http://alidota.cn/player.php">Team</a></li>
<li><a href="http://alidota.cn/about.php">About</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>

<?php
    include "teaminfo.php";

    echo "<br><BR><BR>";

    function show_account($k, $v, $first)
    {
        $collapseid = md5($k);
        if($first%10 == 0)
        {
            $action = "primary";
        }
        else
        { 
            if($collapseid%4 == 0) $action = "success";
            if($collapseid%4 == 1) $action = "info";
            if($collapseid%4 == 2) $action = "warning";
            if($collapseid%4 == 3) $action = "danger";
        }

        $wa = $la = 0;
        foreach($v as $player => $h_arr)
        {
            if($wa < $h_arr["w"]) $wa = $h_arr["w"];
            if($la < $h_arr["l"]) $la = $h_arr["l"];
        }
        echo "<div class=\"panel panel-$action\">";
        echo "<div class=\"panel-heading\"
            data-toggle=\"collapse\" 
            href=\"#$collapseid\" 
            aria-expanded=\"false\" 
            aria-controls=\"$collapseid\">
            <span class=\"glyphicon glyphicon-list\" aria-hidden=\"true\"></span> $k 战绩:  $wa-$la </div>";

        echo "<div class=\"collapse\" id=\"$collapseid\">";
        echo "<div class=\"card card-body\">";
        echo "<ul class=\"list-group\">\n";
        echo "<li class=\"list-group-item\">\n";
        echo "<table class=\"table\" style='table-layout:fixed;'>";
        echo "<tr>";
        echo "<th width=20%>Player</th>";
        echo "<th width=20%>W-L</th>";
        echo "<th width=20%>PR</th>";
        echo "<th width=20%>KDA</th>";
        echo "<th width=20%>Heroes</th>";
        echo "</tr>";
        foreach($v as $player => $h_arr)
        {
            $h = $h_arr["h"];
            $w = $h_arr["w"];
            $l = $h_arr["l"];
            $k = $h_arr["k"];
            $d = $h_arr["d"];
            $a = $h_arr["a"];

            $kda = ($k+$a)/$d;
            $kda = round($kda, 2);

            $heroList = explode('|', $h);
            $pr = ($w+$l)/($wa+$la) * 100;
            $pr = round($pr, 0);

            $style = "style=\"white-space:nowrap;overflow:hidden;text-overflow:ellipsis;\"";
            echo "<tr><td $style>$player</td>";
            echo "<td>$w-$l</td>";
            echo "<td>$pr%</td>";
            echo "<td>$kda</td>";
            
            // hero list
            $show_num = 0;
            $heroimg = "<table class='table'><tr>";
            foreach($heroList as $hero)
            {
                $heroimg = "$heroimg<td>
                    <img src='http://cdn.dota2.com/apps/dota2/images/heroes/${hero}_sb.png' 
                    width='49'/></td>";
                $show_num++;

                if($show_num == 4)
                    $heroimg = "$heroimg</tr><tr>";
            }
            $heroimg = "$heroimg</tr></table>";

            echo "<td>";
            echo "<button type=\"button\" class=\"btn btn-success\" title=\"<b>出场英雄</b>\" 
                data-container=\"body\" data-toggle=\"popover\" data-placement=\"left\" 
                data-backdrop=\"static\" data-content=\"$heroimg\">英雄</button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table></li></ul></div></div>\n";
        echo "</div>";
    }

    $first = 0;
    foreach($teaminfo as $k => $v)
    {
        if(sizeof($v) >= 3) show_account($k, $v, $first);
        $first++;
    }

    // -------------left end--------------

    include "right.php";
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
