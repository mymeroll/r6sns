<?php
$command="python main.py";
exec($command,$output);
echo "$output[0]\n";
?>
