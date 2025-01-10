<?php 

declare(strict_types=1);

define('DATE', date('d.m.Y'));
echo DATE;
echo '<hr>';


$int = 1;
$str = 'string';
$arr = range(1, 10);
$assArr = [
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 3,
];
$boolTrue = true;
$boolFalse = false;
$nullVar = null;

$game = [
    ['X', 0, 'X'],
    [ 0, 'X', 'X'],
    [0, 0, 'X']

];

for($i = 0; $i < count($game); $i++) {
    for($j = 0; $j < count($game[$i]); $j++) {
        echo $game[$i][$j] . " ";
    }

    echo '<br>';
}


foreach ($assArr as $key => $val) {
    //echo "$key: $val <br/>";
}

for ($i = 0; $i < count($arr); $i++) {
    echo "$arr[$i] <br/>";
}
echo '<hr>';

for ($i = count($arr)-1; $i >= 0; $i--) {
    echo "$arr[$i] <br/>";
}
echo '<hr>';

class NewObject {
    public $a = 1;
    public $b = 2;

    private $token = null;
    protected $c = 3;

    public function __construct ($token)
    {
        $this->token = $token;
    }

    public function getAplusB ()
    {
        return $this->a + $this->b;
    }

    protected function getToken ()
    {
        return $this->token;
    }
}

class Obj2 extends NewObject {
    public $d = 4;

    public static $e = 5;

    public function getProperty ()
    {
        return $this->c;
    }
}
 

class PersonKonstantin {
    public $a = 1;
    public $b = 2;
    public $height = 783;
    public $gender = 'M';
    
    protected $weight = 73;
    protected $specialization = 'student';
    protected $colorEye = 'green';

    private $balance = 100000;
    private $birthday = '20.20.2000';

    public function summa ()
    {
        return 5+5;
    }
    
    protected static function getMyInfo ()
    {
        return 'Мне не нравится';
    }
    
    protected function getMyBalance ()
    {
        return 'Мой баланс счета равен: ' . $this->balance;
    }
}

class PersonStepa extends PersonKonstantin {
    public function getInfoFromKonstantin ()
    {
        return parent::$weight;
    }
}

$newObj = new NewObject('1231234234');
$newObj2 = new NewObject('1231234234');




// Функции

function showToDoc ($data) {
    echo $data;
    echo '<br>';
}

function callFunction ($func) {
    return $func();
}

function hello () {
    return 'Hello world!';
}

function message (string $author, string $msg) {
    return "$author: $msg (". date('d.m.Y H:i:s') .")";
}

$createMessage = function (string $author, string $msg): string {
    return "$author: $msg (". date('d.m.Y H:i:s') .")";
};

showToDoc(callFunction('hello'));

// ОБЛАСТЬ ВИДИМОСТИ

$name = 'Андрей';

if(true) {
    $name2 = 'Степа';
}

function localName () {
    global $name2;

    $name3 = 'Костя';

    echo $GLOBALS['name'];

}
localName();


