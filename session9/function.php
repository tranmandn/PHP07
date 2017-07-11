<?php
function weekdays($d){
    echo date('l', $d);
}
function birthtoday($x, $y){
    for ($z = $x; $z <= $y; $z++){
            echo $z . " , ";
    }
}
function danang(){
    $array = array('thanh khe', 'ngu hanh son', 'son tra', 'lien chieu', 'hai chau', 'cam le', 'hoa vang');
    $arrlength = count($array);

    for($x = 0; $x < $arrlength; $x++) {
        echo $array[$x] . " , ";
    }
}
function male(){
    $twotoseven = array("2" => "monday", "3" => "tuesday", "4" => "wednesday", "5" => "thursday", "6" => "friday", "7" => "saturday");
    foreach ($twotoseven as $key => $value){
        echo $key . " is " . $value;
        echo "<br>";
    }
}
function female($name){
    $rename = preg_replace('/([\s]+)/', '-', $name);
    echo $rename;
}
?>