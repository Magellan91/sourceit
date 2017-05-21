<?php
function generator($file)
{
   if (($f = fopen($file, 'r'))!== false){
    while ($line = fgets($f)) {
        yield $line;
    }
    fclose($f);
}
}
$generator = generator("file.csv");
foreach ($generator as $key => $line) {
    echo $line . '<br>';
}