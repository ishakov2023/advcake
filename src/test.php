<?php

function mb_strrev($string)
{
    //Смотрим на длинну строки
    $length = mb_strlen($string, 'UTF-8');
    $reversedString = '';
    //Цикл пока значение не станет 0
    while ($length-- > 0) {
        //Собираем реверсное слово
        $reversedString .= mb_substr($string, $length, 1, 'UTF-8');
    }
    return $reversedString;
}

function mb_ucfirst($str)
{
    //Преобразуем первый символ
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    //Возвращает строку
    return $fc . mb_substr($str, 1);
}

function reverseSentence($sentence)
{
    $words = explode(' ', $sentence);
    //Разбивает на массив
    foreach ($words as $key => $value) {
        //Проверка на пунктуацию
        if (preg_match('/[\p{P}\p{N}]$/u', $value)) {
            //Разбивает слово на массив
            $word = mb_str_split($value);
            //Извлечение последнего значение массива
            $punc = array_pop($word);
            //Вставляем извелеченую часть в начало
            array_unshift($word, $punc);
            //Собираем слова
            $word = implode($word);
            //Собюираем массив
            $words[$key] = $word;
        }
    }
    //Реверсим слова
    $reversedWords = array_map('mb_strrev', $words);
    foreach ($reversedWords as $key => $value) {
        //Проверяем на собпаденеи если слово не совпадает с нижним регистром то True
        if (mb_strtolower($value) != $value) {
            //Делаем первую букву слова заглавной, остальные буквы к нижжнему регистру
            $val = mb_ucfirst(mb_strtolower($value));
            //Собюираем массив
            $reversedWords[$key] = $val;
        }
    }
    return implode(' ', $reversedWords);
}

$sentence = "Привет! Давно не виделись.";
$reversedSentence = reverseSentence($sentence);
echo $reversedSentence;

