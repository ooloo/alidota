<?php
//include "hot.php";

$key = "V001/?key=B1426000A46BD10C3FE0EAB36501A9E3&format=xml&language=zh";
$head = "https://api.steampowered.com/IDOTA2Match_570";

$content = file_get_contents("/var/www/html/GetLiveLeagueGames.xml");
if(empty($content)) exit;

//$arr = $hot;
$arr= array();

$xml = simplexml_load_string($content);

foreach($xml->games->game as $game)
{
    if($game->spectators > 299 && $game->league_id != 0)
    {
        // add league list
        $l = $game->league_id;
        $arr["$l"] = 1;
	
        // record all players
        foreach($game->players->player as $player)
        {
            if($player->team == 0)
                $tn = $game->radiant_team->team_name;
            if($player->team == 1)
                $tn = $game->dire_team->team_name;
            echo "$tn@$player->name\n";
            
            $dbh = dba_open("account.db", "c", "db4");
            dba_replace("$player->account_id", "$tn@$player->name", $dbh);
            dba_close($dbh);
        }
    }
}

echo "GetLiveLeagueGames Done, Ready to get match content.\n";

if(!empty($arr))
{
    foreach($arr as $id => $num)
    {
        $l_url = "$head/GetMatchHistory/$key&league_id=$id";

        $content = file_get_contents("$l_url");
        $conLen = strlen($content);
        echo "league_id=$id ($conLen)\n";
        if($conLen < 128)
        {
            continue;
        }

        file_put_contents("/tmp/$id.xml", "$content");

        $xml = simplexml_load_string($content);

        $show_num = 0;
        foreach($xml->matches->match as $match)
        {
            $player_list = $match->players->player;
            $player_count = $player_list->count();
            //echo "$player_count\n";
            if($player_count != 10) continue;

            $now = time();
            $mtime = "$match->start_time";
            if($now - $mtime > 86400*15) break;

            $m_url = "$head/GetMatchDetails/$key&match_id=$match->match_id";
            $match_file = "/tmp/$match->match_id.xml";
            echo "$match_file\n";
            if(!file_exists($match_file) || filesize($match_file) < 1024)
            {
                $content = file_get_contents("$m_url");
                $conLen = strlen($content);
                if($conLen > 12800)
                {
                    file_put_contents("$match_file", "$content");
                }
            }
        }
    }
}

?>
