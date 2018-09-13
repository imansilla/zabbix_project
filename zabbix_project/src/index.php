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

$prueba = ZabbixAPI::fetch_array('history','get', [
    "output"=> "extend",
    "history" => 0,
    "itemids" => "308229",
    "sortfield" => "clock",
    "sortorder" => "DESC"
]);

echo "<br><br>".json_encode($prueba);





