<pre>
<?php

date_default_timezone_set('Asia/Taipei');

echo date("Y-m-d H:i:s");
echo '<br>';

$t = time();

echo date("Y-m-d H:i:s", $t-180*24*60*60);
echo '<br>';

$t2 = strtotime('2018-2-20');

echo (time()-$t2)/(24*60*60);

?>
</pre>
