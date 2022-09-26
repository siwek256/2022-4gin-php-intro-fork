<?php
header("refresh: 1;"); // Auto refresh strony co sekundę
$lorem = file_get_contents('http://loripsum.net/api');
$wyszukaj = "";
$kolumny = 4;
function filtruj($tablica, $szukaj)
{
    $slowa = explode(" ", $tablica);
    sort($slowa, SORT_NATURAL | SORT_FLAG_CASE);
    foreach ($slowa as $slowo) {
        if (strstr($slowo, $szukaj) == true) {
            $filtr[] = $slowo;
        }
    }
    return $filtr;
}
var_dump(filtruj($lorem, $wyszukaj));


function renderHTMLTable($tablica, $kolumny)
{
    $table = '<table>';
    $slowa = explode(" ", $tablica);
    $liczba = 0;
    foreach ($slowa as $slowo) {
        if (
            $liczba % $kolumny == 0
        ) {
            $table .= '<tr>';
        }
        if (
            $liczba < $kolumny
        ) {
            $table .= '<th>' . $slowo . '</th>';
        } else {
            $table .= '<td>' . $slowo . '</td>';
        }
        if (
            $liczba % $kolumny == $kolumny
        ) {
            $table .= '</tr>';
        }
        $liczba++;
    }
    if (
        count(
            $slowa
        ) % $kolumny !== 0
    ) {
        $table .= '</tr>';
    }
    return $table;
}
echo renderHTMLTable($lorem, $kolumny);
// Niestety eksportuje pusty plik CSV
$file = fopen("array.csv", "w");

foreach ($slowa as $row) {
    fputcsv($f, $row);
}
// Close the file
fclose($f);


// Zadania rozwiązywane z różnego rodzaju stronami internetowymi
?>
<!--  -->