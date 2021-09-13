<?php

$official_account = array();
//$personaname = array();

//$key = "v2/?key=B1426000A46BD10C3FE0EAB36501A9E3";
//$head = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries";

$key = "v1/?key=B1426000A46BD10C3FE0EAB36501A9E3&format=xml&language=zh";
$head = "https://api.steampowered.com/IDOTA2Fantasy_205790/GetPlayerOfficialInfo";

$file = file("/tmp/officialname_filelist") or exit("Unable to open file!");
foreach($file as $line)
{
    $filename = str_replace("\n", "", $line);
    $content = file_get_contents("$filename");
    $xml = simplexml_load_string($content);

    if(empty($xml->players))
    {
        continue;
    }

    foreach($xml->players->player as $player) 
    {
	    //$steamid = 76561197960265728 + $player->account_id;
        //$playerurl = "$head/$key&steamids=$steamid";
	    $steamid = $player->account_id;
        $playerurl = "$head/$key&accountid=$steamid";
        $official_account["$player->account_id"] = "$playerurl";
    }
}

foreach($official_account as $accid => $playerurl)
{
    $content = file_get_contents("$playerurl");

    echo "$playerurl\n";
    $xml = simplexml_load_string($content);
    //$tmpJson = json_decode($content, TRUE);
    //$offname = $tmpJson["response"]["players"][0]["personaname"];
    //$personaname["$accid"] = "$offname"; 
    //continue;

    if(!empty($xml->Name) && !empty($xml->TeamTag))
    {
        $dbh = dba_open("official_account.db", "c", "db4");
        dba_replace("$accid", "$xml->TeamTag@$xml->Name", $dbh);
        dba_close($dbh);
        echo "$accid $xml->TeamTag@$xml->Name\n";
    }
}

//$handle = fopen("./personaname.php", "w+");
//fwrite($handle, '<?php'.chr(10).'$personaname='.var_export ($personaname,true).';'.chr(10).'?>');
//fclose($handle);

?>
