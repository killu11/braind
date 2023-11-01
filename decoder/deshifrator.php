<?php
    include ('decodeArr.php');


    /**
     * функция для с плита с поддержкой кодировки
     * return array
    **/
    function chars_of($str) {
        return preg_split('/(?<!^)(?!$)/u', $str);
    }

    /**
     * callback функция для array_map, сравнивает элемент с таблицей и возвращает значение из таблицы
     * return string
     **/
    function callBack($el) {

        $searchArr = decodeArr\Binary::$codedArr;

        if($el == array_key_exists ($el, $searchArr)) return $searchArr[$el];
    }

    /**
     * callback функция для array_map, проверяет наличие элемента в массиве и возвращает нужный индекс(в контексте программы букву)
     * return string
     **/

    function __callBack($el) {

        $searchArr = decodeArr\Binary::$codedArr;

        if(in_array($el,$searchArr)) return array_search($el,$searchArr);

    }

    /**
     * функция возвращающая бинарный массив
     * return array
     **/
    function toBinar ($str) {

      return array_map('callBack',chars_of($str));

    }
    /**
     * функция возвращающая буквенный массив
     * return array
     **/
    function fromBinaryToString ($binaryArray) {
        return array_map('__callBack', $binaryArray);
    }

    /**
     * проверка одинаковых строк
     * return boolean
     **/
    function areTheSame ($first, $second) {

        if(strncmp($first,$second, strlen($first)) == 0) return true;

    }

    /**
     * функция сложения
     * return string
     **/
    function binarPlus($x, $y) {

        if(areTheSame($x,$y)) return $x;

        $splitX = chars_of($x);
        $splitY = chars_of($y);

        $result = '';

        foreach($splitX as $key => $value) {

            if(($value == 0) && ($splitY[$key] == 0) || ($value == 1) && ($splitY[$key] == 1)) $result .= '0';

            else $result .= '1';

        }

        return $result;
    }

    /**
     * функция для получения того самого заветного слова для кодировки (СЕМИДЕСЯТИМГОЛЬНИК), не знаю почему имено МГОЛЬНИК,но ладно
     * return array
     **/
    function findDecodeWord () {

        $message = 'ООО|СТРОИГАЗМОНТАЖ';
        $codedMessage = 'ЯЗБИФФАСЫННМБДСЯЗН';

        return fromBinaryToString(array_map('binarPlus', toBinar($message), toBinar($codedMessage)));
    }
    print_r('Слово для декода: '. implode('', findDecodeWord()) . ' ');

    /**
     * функция для расшифровки РЗМШМГЮПЬДЕКБГЧЛВШ
     * return string (АОМСИБПРОМКОМПЛЕКТ), почему трубы то((
     **/
    function finallyDecode () {

        $codedMessage = toBinar('РЗМШМГЮПЬДЕКБГЧЛВШ');
        $binarKey = toBinar(implode('', findDecodeWord()));

        return implode('', fromBinaryToString(array_map('binarPlus', $codedMessage, $binarKey)));
    }

    print_r('Расшифровка РЗМШМГЮПЬДЕКБГЧЛВШ: '.finallyDecode());









