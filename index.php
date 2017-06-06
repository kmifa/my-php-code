<pre>
<?php

$subject = "Apple Pie";

$result = str_ireplace("p","?",$subject,$count);
echo "置換前 : {$subject}", "\n";
echo "置換前 : {$result}", "\n";
echo "個数 : {$count}";

?>

</pre>