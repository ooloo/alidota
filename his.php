<?php

    include "team.php";
    include "match_info.php";
    include "match_score.php";

    // ------------------------- live end -----------------------------
    $lastday = "";

    foreach($match_info as $key => $value)
    {
        $karr = explode(',', $key);
        $series_id = $karr[1];
        $series_type = $karr[2];
        $bo = 1;
        if($series_type == 1)
            $bo = 3;
        else if($series_type == 2)
            $bo = 5;
        else
            $bo = 1;

        $arr = explode(',', $value);
        $matid = $arr[0];
        $stime = $arr[1];
        $ln = $arr[2];
        $star = $arr[3];
        $aside = $team[(int)"$arr[4]"];
        $bside = $team[(int)"$arr[5]"];

        //if($aside == "" || $bside == "") continue;

        $d1 = date('Y-m-d H:i', (int)($stime));

        $matchtime = explode(' ',$d1);
        $day = $matchtime[0];
        $hour = $matchtime[1];

        $weekarray=array("日","一","二","三","四","五","六");
        $week = "星期".$weekarray[date('w',strtotime($day))]; 
    
        $collapseid = md5($week);
        if($collapseid%4 == 0) $action = "success";
        if($collapseid%4 == 1) $action = "info";
        if($collapseid%4 == 2) $action = "warning";
        if($collapseid%4 == 3) $action = "danger";

        if($day != $lastday)
        {
            if($lastday != "")
            {
                echo "</table></li></ul></div>\n";
            }
            echo "<div class=\"panel panel-$action\">";
            echo "<div class=\"panel-heading\">$day $week</div>\n";
            echo "<ul class=\"list-group\">\n";
            echo "<li class=\"list-group-item\">\n";
            echo "<table class=\"table\" style='table-layout:fixed;'>";
            $lastday = $day;
        }
        
        $tdstyle = "white-space:nowrap;overflow:hidden;text-overflow:ellipsis;";
        echo "<tr>\n";
        echo "<td width=15% style=\"vertical-align:middle\">$hour</td>";
        //echo "<td width=40% style=\"vertical-align:middle\">$ln($karr[1])</td>";
        echo "<td width=30% style=\"vertical-align:middle;$tdstyle\">联赛id:$ln</td>";
        echo "<td width=15% style=\"vertical-align:middle\">BO$bo</td>";

        $score = $match_score[$key];
        $r1 = floor((int)$score/10);
        $r2 = floor((int)$score%10);
        if($star == 1)
            echo "<td width=40% noWrap=\"noWrap\"><b>$aside<font color=green>&nbsp;$r1:$r2&nbsp;</font>$bside</b></td>";
        else
            echo "<td width=40% style=\"$tdstyle\">$aside<font color=green><b>&nbsp;$r1:$r2&nbsp;</b></font>$bside</td>";
        echo "</tr>\n";
    }
    if($lastday != "")
    {
	echo "</table></li></ul></div>\n";
    }

// --------- history end ----------
?>
