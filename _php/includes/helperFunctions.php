<?php
function calculateAge($birthDate) {
	$birthDate = explode("/", $birthDate);

	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
		? ((date("Y") - $birthDate[2]) - 1)
		: (date("Y") - $birthDate[2]));

	return $age;
}

function insertIntoNumericArray($arr, $insert, $index) {
	$return = array();

	for ($i = 0; $i < count($arr); $i++) {
		if ($i == $index) {
			$return[] = $insert;
		}
		$return[] = $arr[$i];
	}
	return $return;
}

?>