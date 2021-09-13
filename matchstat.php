<?php
include "team.php";
include "personaname.php";

$content = file_get_contents("GetHeroesListing.xml");
$xml = simplexml_load_string($content);
$heroes_arr = array("0" => "NULL");
$len = strlen("npc_dota_hero_");
foreach($xml->heroes->hero as $hero)
{
    $heroes_arr["$hero->id"] = substr($hero->name, $len);
}
$stat = array();
$count = array();
$hot = array();
$kda = array();
$teaminfo = array();

$file = file("/tmp/matches_filelist") or exit("Unable to open file!");
foreach($file as $line)
{
    $filename = str_replace("\n", "", $line);
    $content = file_get_contents("/tmp/$filename");

    if(empty($content)) continue;

    $xml = simplexml_load_string($content);

    //if(empty($xml->radiant_name) || empty($xml->dire_name))
      //  continue;
    if($xml->first_blood_time == "0" || empty($xml->first_blood_time))
        continue;
    if($xml->human_players != "10")
        continue;

    array_push($hot, "$xml->leagueid");

    // heroes
    foreach($xml->players->player as $player)
    {
        $name = $heroes_arr["$player->hero_id"];
        if(!isset($stat["$name"]))
            $stat["$name"] = array();
        $arr = array(
                "$player->item_0",
                "$player->item_1",
                "$player->item_2",
                "$player->item_3",
                "$player->item_4",
                "$player->item_5"
                );
        foreach($arr as $item)
        {
            if($item != "0")
            {
                if(!isset($stat["$name"]["$item"]))
                    $stat["$name"]["$item"] = 1;
                else
                    $stat["$name"]["$item"] = ++$stat["$name"]["$item"];
            }
        }
        arsort($stat["$name"]);

        if(!isset($count["$name"]))
            $count["$name"] = array(
                    "all" => 0,
                    "w" => 0,
                    "l" => 0,
                    "k" => 0,
                    "d" => 0,
                    "a" => 0,
                    );
        $count["$name"]["all"] = ++$count["$name"]["all"];

        $player_slot = "$player->player_slot";
        if(($player_slot < 10 && $xml->radiant_win == "true")
                || ($player_slot > 120 && $xml->radiant_win == "false"))
            $count["$name"]["w"] = ++$count["$name"]["w"];
        else
            $count["$name"]["l"] = ++$count["$name"]["l"];

        $count["$name"]["k"] = $count["$name"]["k"] + $player->kills;
        $count["$name"]["d"] = $count["$name"]["d"] + $player->deaths;
        $count["$name"]["a"] = $count["$name"]["a"] + $player->assists;
    }

    //history
    foreach($xml->players->player as $player)
    {
        $player_slot = "$player->player_slot";
        if($player_slot < 10) $teamid = $xml->radianti_team_id;
        if($player_slot > 120) $teamid = $xml->dire_team_id;
	
	if($teamid == "") continue;
	if(array_key_exists("$teamid", $team))
	    $teamname = $team["$teamid"];
	else
	    continue;

	if($teamname == "") continue;

	if(array_key_exists("$player->account_id", $personaname))
            $key = $teamname."@".$personaname["$player->account_id"];
	else
	    continue;

        echo "$key =============\n";
        $name = $heroes_arr["$player->hero_id"];

        if(!isset($kda["$key"]))
            $kda["$key"] = array();

        if(!isset($kda["$key"]["$name"]))
            $kda["$key"]["$name"] = array(
                    "all" => 0,
                    "w" => 0,
                    "l" => 0,
                    "k" => 0,
                    "d" => 0,
                    "a" => 0,
                    );

        $kda["$key"]["$name"]["all"] = ++$kda["$key"]["$name"]["all"];

        if(($player_slot < 10 && $xml->radiant_win == "true")
                || ($player_slot > 120 && $xml->radiant_win == "false"))
            $kda["$key"]["$name"]["w"] = ++$kda["$key"]["$name"]["w"];
        else
            $kda["$key"]["$name"]["l"] = ++$kda["$key"]["$name"]["l"];

        $kda["$key"]["$name"]["k"] = $kda["$key"]["$name"]["k"] + $player->kills;
        $kda["$key"]["$name"]["d"] = $kda["$key"]["$name"]["d"] + $player->deaths;
        $kda["$key"]["$name"]["a"] = $kda["$key"]["$name"]["a"] + $player->assists;
        arsort($kda["$key"]);
    }
}

arsort($count);

$handle = fopen("./teamkda.php", "w+");
fwrite($handle, '<?php'.chr(10).'$teamkda='.var_export ($kda,true).';'.chr(10).'?>');
fclose($handle);

// player - pre
foreach($kda as $k => $v)
{
    $kda[$k] = array_splice($v, 0, 3);
}

// player - top3.info
foreach($kda as $k => $v)
{
    echo "----------- $k\n";
    $teamTmp = explode('@', $k, 2);
    $teamName = $teamTmp[0];
    $playerName = $teamTmp[1];

    if(!isset($teaminfo["$teamName"])) { $teaminfo["$teamName"] = array(); }

    foreach($v as $hero => $h_arr)
    {
        if(!isset($teaminfo["$teamName"]["$playerName"]))
        {
            $teaminfo["$teamName"]["$playerName"] = array(
                    "h" => "$hero",
                    "w" => $h_arr["w"],
                    "l" => $h_arr["l"],
                    "k" => $h_arr["k"],
                    "d" => $h_arr["d"],
                    "a" => $h_arr["a"],
                    );
        }
        else
        {
            $teaminfo["$teamName"]["$playerName"]["h"] = $teaminfo["$teamName"]["$playerName"]["h"]."|$hero";
            $teaminfo["$teamName"]["$playerName"]["w"] = $teaminfo["$teamName"]["$playerName"]["w"]+$h_arr["w"];
            $teaminfo["$teamName"]["$playerName"]["l"] = $teaminfo["$teamName"]["$playerName"]["l"]+$h_arr["l"];
            $teaminfo["$teamName"]["$playerName"]["k"] = $teaminfo["$teamName"]["$playerName"]["k"]+$h_arr["k"];
            $teaminfo["$teamName"]["$playerName"]["d"] = $teaminfo["$teamName"]["$playerName"]["d"]+$h_arr["d"];
            $teaminfo["$teamName"]["$playerName"]["a"] = $teaminfo["$teamName"]["$playerName"]["a"]+$h_arr["a"];
        }
    }
}

//ksort($kda);

$handle = fopen("./stat.php", "w+");
fwrite($handle, '<?php'.chr(10).'$stat='.var_export ($stat,true).';'.chr(10).'?>');
fclose($handle);

$handle = fopen("./count.php", "w+");
fwrite($handle, '<?php'.chr(10).'$count='.var_export ($count,true).';'.chr(10).'?>');
fclose($handle);

$handle = fopen("./hot.php", "w+");
fwrite($handle, '<?php'.chr(10).'$hot='.var_export (array_count_values($hot),true).';'.chr(10).'?>');
fclose($handle);

$handle = fopen("./teaminfo.php", "w+");
fwrite($handle, '<?php'.chr(10).'$teaminfo='.var_export ($teaminfo,true).';'.chr(10).'?>');
fclose($handle);

?>
