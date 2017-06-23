<?php
$filename='zli.gz';
$s = "Даный текст будет сжатый и записан, после чего открыт!<br>\n";
$s2 = "Эта строка не запишится<br>\n";
$zp = gzopen($filename, "w9");
gzwrite($zp, $s);
gzclose($zp);
$zp = gzopen($filename, "r");
flock ($zp,LOCK_EX);
gzwrite($zp, $s2);//Пытаемся записать нову строку
echo gzread($zp, 3);
gzpassthru($zp);
flock ($zp,LOCK_UN);
gzclose($zp);
