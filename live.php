<?php

$content = file_get_contents("/var/www/html/GetLiveLeagueGames.xml");
$xml = simplexml_load_string($content);

echo "<div class=\"panel panel-primary\">";
echo "<div class=\"panel-heading\">Live Game</div>\n";
echo "<ul class=\"list-group\">\n";
echo "<li class=\"list-group-item\">\n";
echo "<table class=\"table\" style='table-layout:fixed;'>";

foreach($xml->games->game as $game)
{
    $r = $game->radiant_team->team_name;
    $d = $game->dire_team->team_name;
    $s = $game->spectators;
    $l = $game->league_id;

    if(empty($r))   { $r = "天辉#noname#"; continue; }
    if(empty($d))   { $d = "夜魇#noname#"; continue; }

    $duration = time() - $game->scoreboard->duration;

    $dur = date('H:i',floor($duration));

    $bo = 0;
    if($game->series_type == 1)
        $bo = 3;
    else if($game->series_type == 2)
        $bo = 5;
    else
        $bo = 1;


    $rw = $game->radiant_series_wins;
    $dw = $game->dire_series_wins;
    $rscore = $game->scoreboard->radiant->score;
    $dscore = $game->scoreboard->dire->score;

    $style = "style=\"white-space:nowrap;overflow:hidden;text-overflow:ellipsis;\"";
    echo "<tr>";
    echo "<td width=15%>$dur</td>";
    echo "<td width=25% $style>联赛id:$l-观众:$s</td>";
    echo "<td width=25%>BO$bo($rw:$dw)</td>";
    echo "<td width=35% $style>$r ($rscore)<font color=green><b>&nbsp;.VS&nbsp;</b></font>($dscore) $d</td>";
    echo "</tr>";
}

echo "</table>";
echo "</li></ul></div>\n";

// live end
?>
