<?php

// http://www.dota2.com/jsfeed/itemdata

$content = file_get_contents("https://api.steampowered.com/IEconDOTA2_570/GetGameItems/V001/?key=B1426000A46BD10C3FE0EAB36501A9E3&language=LANGCODE");
$obj = json_decode($content);

$items_cost = array();
$items_name = array(0=>"");
foreach($obj->result->items as $item)
{
    print_r($item);
    $id = "$item->id";
    $pr = "$item->cost";
    $items_cost["$id"] = "$pr";
    $nm = "$item->name";
    $items_name["$id"] = substr($nm, 5);
}

$handle = fopen("./items_cost.php", "w+");
fwrite($handle, '<?php'.chr(10).'$items_cost='.var_export (array_unique($items_cost),true).';'.chr(10).'?>');
fclose($handle);
$handle = fopen("./items_name.php", "w+");
fwrite($handle, '<?php'.chr(10).'$items_name='.var_export (array_unique($items_name),true).';'.chr(10).'?>');
fclose($handle);
?>
