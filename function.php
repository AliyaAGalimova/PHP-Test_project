<?php
$txt = "Ca.t,";
// $txt = "домИК";
$array = array();

for ($i = 0; $i < strlen($txt); $i++) {
	if(preg_match('/[A-Z]/', $txt[$i])==true)
	{
       $array[] = $i;
    }
}

$output = '';
$array_punct = array();

// собираем строку без знаков препинания
for ($i = 0; $i < strlen($txt); $i++) {
	if(preg_match('/[[:punct:]]/', $txt[$i])==true)
	{
      	$array_punct[$i] = $txt[$i];
    } else {
    	$output .= $txt[$i];
    }
}

// переворачиваем строку и переводим все символы в нижний регистр
$helper = strtolower(strrev($output)); 

// добавляем знаки препинания
for ($i = 0; $i < strlen($txt); $i++) {
	if(array_key_exists($i, $array_punct)) {
    	$result .= $array_punct[$i];
		if(isset($helper[$i])) {
			$result .= $helper[$i];
		}
    }  else {
    	$result .= $helper[$i];
    }
}

// переводим символы в верхний регистр там, где необходимо
for ($i = 0; $i < strlen($result); $i++) {
	if(in_array($i, $array)) {
 		$txt_new .= strtoupper($result[$i]);
    } else {
    	$txt_new .= $result[$i];
    }
}

echo $txt_new .'<br />';
echo '<pre>';
print_r($array);
print_r($array_punct);
echo '</pre>';