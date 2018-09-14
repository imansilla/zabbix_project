<?php
require_once("ZabbixAPI.class.php");

if(!ZabbixAPI::login('https://zabbix01.nubity.com/api_jsonrpc.php','imansilla','l1nuxm4n'))
{
    die('Unable to login: '.print_r(ZabbixAPI::getLastError(),true));
}

/*
if(!ZabbixAPI::logout('https://zabbix01.nubity.com/api_jsonrpc.php','imansilla'))
{
    die('Unable to login: '.print_r(ZabbixAPI::getLastError(),true));
}
*/

$prueba = ZabbixAPI::fetch_array('trend','get', [
    "output"=> "extend",
    "history" => 0,
    "itemids" => "294215",
    "sortfield" => "clock",
    "sortorder" => "DESC",
    "time_from" => "1518652800"
]);
/**
 * Devuelvo los valores promedio con las fechas del Item "CPU System Time
 */

$final = [];

$headers = ["Fecha", "Valor Promedio"];
$final[] = $headers;

foreach($prueba as $values)
{
    array_push($final, [date('m/d/Y h:m:i', $values['clock']), $values['value_avg']]);
}

echo "<br><br>".json_encode($final);









