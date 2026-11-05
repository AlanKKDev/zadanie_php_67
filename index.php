<?php 

$uczniowie = [
    ["imie" => "Adam", "punkty" => 85],
    ["imie" => "Kasia", "punkty" => 92],
    ["imie" => "Marek", "punkty" => 48],
    ["imie" => "Ola", "punkty" => 67],
    ["imie" => "Tomek", "punkty" => 35]
];

$punkty = 0;

function przyznajOcene($punkty){
    if ($punkty >= 0 && $punkty <= 39) {
        return 1;
    } else if ($punkty >= 40 && $punkty <= 59){
        return 2;
    } else if ($punkty >= 60 && $punkty <= 79){
        return 3;
    } else if ($punkty >= 80 && $punkty <= 89){
        return 4;
    } else if ($punkty >= 90 && $punkty <= 100){
        return 5;
    } else {
        return 0;
    }
}

function czyZdal($punkty){
    return $punkty >= 40;
}

function obliczProcent($punkty){
    return $punkty / 100 * 100;
}

echo "RAPORT WYNIKÓW TESTU INFORMATYCZNEGO<br>";

foreach ($uczniowie as $uczen) {
    echo "<br>" . $uczen["imie"] . ":<br>";
    echo "- Punkty: " . $uczen["punkty"] . "<br>";
    echo "- Procent: " . obliczProcent($uczen["punkty"]) . "%<br>";
    echo "- Ocena: " . przyznajOcene($uczen["punkty"]) . "<br>";
    echo "- Status: " . (czyZdal($uczen["punkty"]) ? "ZALICZONY" : "NIEZALICZONY") . "<br>";
}

$suma = 0;
for ($i = 0; $i < count($uczniowie); $i++) {
    $suma = $suma + $uczniowie[$i]["punkty"];
}
$srednia = $suma / count($uczniowie);

$zdali = [];
$niezdali = [];
foreach ($uczniowie as $uczen) {
    if (czyZdal($uczen["punkty"])) {
        $zdali[] = $uczen["imie"];
    } else {
        $niezdali[] = $uczen["imie"];
    }
}

echo "<br>--------------------------------<br>";
echo "PODSUMOWANIE KLASY<br><br>";
echo "Liczba uczniów: " . count($uczniowie) . "<br>";
echo "Suma punktów: " . $suma . "<br>";
echo "Średnia punktów: " . $srednia . "<br><br>";
echo "Zaliczyło: " . count($zdali) . "<br>";
echo "Nie zaliczyło: " . count($niezdali) . "<br>";
echo "Nie zaliczyli: " . implode(", ", $niezdali) . "<br><br>";

switch (true) {
    case $srednia < 40:
        $komentarz = "Bardzo słaby wynik klasy";
        break;
    case $srednia < 60:
        $komentarz = "Wynik klasy jest niezadowalający";
        break;
    case $srednia < 80:
        $komentarz = "Dobry wynik klasy";
        break;
    default:
        $komentarz = "Bardzo dobry wynik klasy";
}
echo "Komentarz: " . $komentarz . "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>