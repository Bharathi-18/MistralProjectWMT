<?php
echo "Waiting";
$command = escapeshellcmd('python sub.py');
$output = shell_exec($command);
echo $output;
?>