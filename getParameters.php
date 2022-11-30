<?php
        echo "<h1>getParameters page</h1>";
        
        $sn1 = $_GET["a"]; //nacitame jednu hodntu
        $sn2 = $_GET["b"]; //druhu
        
        $text = "a=" . $sn1 . " b=" . $sn2;
        $sum = $sn1 + $sn2; //zratame
        
        echo $text;
        echo "<br>";
        echo "Sum:" . $sum; //vypiseme na web
         // za urlku mojej stranky lomitko a getParameters.php za php ? a=10 & b=2
    ?>

   