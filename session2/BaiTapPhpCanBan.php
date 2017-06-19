<?php
define("NAMSINH", "1991");
define("TEN", "Man");
define("HO", "Tran");
define("TENLOT", "Ngoc");
if (NAMSINH % 2 !== 0) {
	for ($x = 100; $x > 0; $x--) { 
		if ($x % 2 !== 0) {
			echo HO . "&nbsp" . TENLOT . "<br>";
		} else {
			echo TEN . "<br>";
		}
	}
}
echo "Ten co: " . strlen(TEN) . " ki tu<br>";
echo "Thay the ten thanh: " . str_replace("TEN", "Man", "Maria") . "<br>";
function TinhToan($NamSinh){
	if ($NamSinh % 9 == 0) {
		echo "Nam sinh chia het cho 9: " . 99 . "<br>";
	} else {
		echo "Nam sinh khong chia het cho 9: " . 66 . "<br>";
	}
}
TinhToan(NAMSINH);
echo "Ten toi chi co: " . str_word_count(TEN) . " chu";

?>