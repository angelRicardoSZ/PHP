<?php
$hours = readline("Enter the hours: ");
$minutes = readline("Enter the minutes: ");
$seconds = readline("Enter the seconds: ");

$hoursSeconds =  (int) ($hours * 3600);

$minutesSeconds =  (int) ($minutes * 60);

$totalSeconds = ($hoursSeconds + $minutesSeconds + $seconds);

echo "Se ingresaron $hours horas, $minutes minutos y $seconds segundos equivalentes a $totalSeconds segundos";