<?php

class String
{
    public function strangeString(string $text): string
    {
        // собираем массив слов
        $words = preg_split("/[\s,-`]+/", $text, -1, PREG_SPLIT_NO_EMPTY);

        // собираем массив символов-разделителей
        $delimeters = array();

        for ($i = 0; $i < strlen($text); $i++) {
            if (preg_match('/[\s-`]+/', $text[$i]) == true)
            {
            $delimeters[$i] = $text[$i];
            }
        }

        // создаем массив для хранения результата
        $new_text = array();

        // работаем отдельно с каждым словом

        foreach ($words as $txt) {

        $array = array();
            
        for ($i = 0; $i < strlen($txt); $i++) {
            if (preg_match('/[A-Z]/u', $txt[$i]) == true)
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
        
        $result = '';
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
        
        $txt_new = '';
        for ($i = 0; $i < strlen($result); $i++) {
            if(in_array($i, $array)) {
                $txt_new .= strtoupper($result[$i]);
            } else {
                $txt_new .= $result[$i];
            }
        }

        $new_text[] = $txt_new;
        }

        print_r($new_text);

        $output_string = '';

        for ($i = 0; $i < count($new_text); $i++) {
            if($i == 0 && array_key_exists(0, $delimeters)) {
                $output_string .= $delimeters[$i];
                unset($delimeters[$i]);
            }
            
            if($i == 0) {
                $delimeters = array_values($delimeters);
            }
            
            $output_string .= $new_text[$i] . $delimeters[$i];
        }

        return $output_string;
    }


}
?>
