#!/usr/bin/php
<?php

if ($argc != 2)
	die;
if (preg_match("/^([lL]undi|[mM]ardi|[mM]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi|[dD]imanche)\s([1-9]|[1-2][0-9]|3[0-1])\s([jJ]anvier|[fF]evrier|[mM]ars|[aa]vril|[mM]ai|[jJ]uin|[jJ]uillet|[aA]out|[sS]eptembre|[oO]ctobre|[nN]ovembre|[dD]ecembre)\s(19[7-9][0-9]|[2-9][0-9][0-9][0-9])\s([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $argv[1], $date) == 0)  //holy fuck//
{
	echo "Wrong Format\n";
	die;
}
date_default_timezone_set("Europe/Paris");
$to_convert = $date[2]."-";
switch (lcfirst($date[3]))
{
	case "janvier":
		$to_convert = $to_convert."01"."-";
		break;
	case "fevrier":
		$to_convert = $to_convert."02"."-";
		break;
	case "mars":
		$to_convert = $to_convert."03"."-";
		break;
	case "avril":
		$to_convert = $to_convert."04"."-";
		break;
	case "mai":
		$to_convert = $to_convert."05"."-";
		break;
	case "juin":
		$to_convert = $to_convert."06"."-";
		break;
	case "juillet":
		$to_convert = $to_convert."07"."-";
		break;
	case "aout":
		$to_convert = $to_convert."08"."-";
		break;
	case "septembre":
		$to_convert = $to_convert."09"."-";
		break;
	case "octobre":
		$to_convert = $to_convert."10"."-";
		break;
	case "novembre":
		$to_convert = $to_convert."11"."-";
		break;
	case "decembre":
		$to_convert = $to_convert."12"."-";
		break;
}
$to_convert = $to_convert.$date[4];
$to_convert = $to_convert." ".$date[5].":".$date[6].":".$date[7];
echo strtotime($to_convert)."\n";

?>