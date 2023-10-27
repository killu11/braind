<?php
    //вспомогательная функция для реверса
    function strReverse ($str) {
        return join(' ', array_reverse(explode(' ', $str)));
    }

    //функци для получения 3х последних слов
    function getLastWords($text)
    {
        $splitText = explode(' ', $text);
        $lastWords = '';

        if (!$text or strlen($text) > 255) return null;

        for ($i = 1; $i <= 3; $i++) {

            if($i != 3) {
                $lastWords .= $splitText[count($splitText) - $i]. ' ';

            } else $lastWords.= $splitText[count($splitText) - $i];
        }

        return strReverse($lastWords);
    }

    function getTextWithoutLastWords ($text) {
        $splitText = explode(' ', $text);
        return join (' ', array_slice($splitText, 0, count($splitText) - 3));
    }

    //конкатенация ... и добавление ссылки на полный текст
    function getAnnouncement($text, $link) {

        if (getLastWords($text) == null || !$link) return 'Invalid values were entered';

        $announceWords = '<p>'. getTextWithoutLastWords($text);
        $linkWors = '<a href="'. $link .'">'.getLastWords($text). "...". '</a></p>';

        return $announceWords . $linkWors;

    }

    print_r(getAnnouncement('всем привет меня зовут саша с канала мастерская настроения', 'google.com'));


