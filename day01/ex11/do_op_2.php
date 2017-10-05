#!/usr/bin/php
<?php
if ($argc != 2)
{
    echo "Incorrect Parameters\n";
    return ;
}
$param1 = trim($argv[1]);
$param1 = preg_replace('!\s+!', '', $argv[1]);
$operator = preg_match("/[\+\-\*\%\/]/", $param1);
if ($operator == 1)
{
    if ($var = strripos($param1, "+"))
        $op = '+';
    else if ($var = strripos($param1, '-'))
        $op = '-';
    else if ($var = strripos($param1, '*'))
        $op = '*';
    else if ($var = strripos($param1, '%'))
        $op = '%';
    else if ($var = strripos($param1, '/'))
        $op = '/';
}
$string = preg_split('/[\+\-\*\%\/]/', $param1);
if (!is_numeric($string[0]) || !is_numeric($string[1]))
{
    echo "Syntax Error\n";
    return ;
}
$nb_param = count($string);
if ($nb_param != 2)
    return ;
if ($op == '+')
    echo $string[0] + $string[1] , "\n";
else if ($op == '-')
    echo $string[0] - $string[1] , "\n";
else if ($op == '*')
    echo $string[0] * $string[1] , "\n";
else if ($op == '%')
    echo $string[0] % $string[1] , "\n";
else if ($op == '/')
    echo $string[0] / $string[1] , "\n";
?>