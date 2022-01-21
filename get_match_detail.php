<?php
include "match_list.php";

$key = "V001/?key=B1426000A46BD10C3FE0EAB36501A9E3&format=xml&language=zh";
$head = "https://api.steampowered.com/IDOTA2Match_570";

$content = file_get_contents("/var/www/html/GetLiveLeagueGames.xml");
if(empty($content)) exit;

$arr= $match_list;

$xml = simplexml_load_string($content);

foreach($xml->games->game as $game)
{
    if($game->spectators > 99 && $game->league_id != 0)
    {
        // add league list
        $id = $game->match_id;
        $arr["$id"] = 0;
    }
}

echo "GetLiveLeagueGames Done, Ready to get match content.\n";

if(!empty($arr))
{
    foreach($arr as $id => $num)
    {
        if($num == 0)
        {
            $m_url = "$head/GetMatchDetails/$key&include_persona_names=1&match_id=$id";
            $match_file = "/tmp/$id.xml";

            echo "found $match_file\n";
            $content = file_get_contents("$m_url");
            $conLen = strlen($content);
            echo "/tmp/$id.xml =====> $conLen\n";
            if($conLen > 4096)
            {
                file_put_contents("$match_file", "$content");
                $arr["$id"] = $conLen;
            }
        }
    }
}

$handle = fopen("./match_list.php", "w+");
fwrite($handle, '<?php'.chr(10).'$match_list='.var_export ($arr,true).';'.chr(10).'?>');
fclose($handle);

?>
