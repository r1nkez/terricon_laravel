

<!-- // Основы синтаксиса
HTML может использоваться в PHP файле, но не наоборот -->
<!-- <!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<h1>Сайт на PHP</h1>
<!-- <?php
echo "Привет мир!";
?>
Это равносильно т е не надо использовать ?php, и echo 
<h2>
<?= 
"Привет мир!";
?>    
</h2>
<br>
</body>
</html> -->



<!-- Комментарий в HTML
// комментарий в PHP
/*
текст
*/
-->



<!-- Переменные хранят отдельные значения, для их создания необходим знак доллара $
С помощью = присваивается значение переменной
-->
<?php

// определение переменной $num
// $num = 10;
// // вывод значения переменной $num на веб-страницу
// echo $num;

// // меняем значение переменной
// $num = 22;
// echo $num;

// //Также можно присваивать значение другой переменной:

// $a = 15;
// $b = $a;
// echo $b;

// // перед использованием переменной ей следует присвоить начальное значение.
// // Чтобы вывести значение нескольких переменных сразу можно использовать двойные кавычки, в отличии от одинарных они конвертируют переменные в их значение
// $num_1 = 11;
// $num_2 = 35;
 
// echo "num_1 = $num_1  num_2=$num_2";

$products = [
    "Milk" => 1.2,
    "Bread" => 0.8,
    "Cheese" => 2.5,
    "Butter" => 1.8
];

$max = 0;
$max_key = null;

$min = reset($products);
$min_key = key($products);

foreach ($products as $key => $val) {
    if ($val > $max) {
        $max = $val;
        $max_key = $key;
    }
    if ($val < $min) {
        $min = $val;
        $min_key = $key;
    }
}

// Вывод продуктов и цен
foreach ($products as $key => $val) {
    echo "$key - $val<br>";
}

echo "Максимальная цена: $max_key - $max<br>";
echo "Минимальная цена: $min_key - $min<br><br>";

$percentage = 10; // Увеличение на 10%
foreach ($products as $key => $val) {
    $products[$key] = $val + ($val * $percentage / 100);
}

$productToDelete = "Bread";
if (array_key_exists($productToDelete, $products)) {
    unset($products[$productToDelete]);
    echo "Продукт '$productToDelete' удалён.<br>";
} else {
    echo "Продукт '$productToDelete' не найден.<br>";
}

echo "Итоговый список продуктов:<br>";
foreach ($products as $key => $val) {
    echo "$key - $val<br>";
}

