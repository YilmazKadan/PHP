<?php
 
for($i=2;$i<=100;$i++)
{
    $asal=true;
    for($j=2;$j<=$i-1;$j++)
    {
        if ($i%$j==0)
        $asal=false;
      }
      if ($asal) echo $i."<br>";
}
 
?>
