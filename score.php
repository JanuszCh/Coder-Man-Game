<?php


session_start();

if (isset($_GET['name']) === true && isset($_GET['score']) === true) {

    // if (!isset($_SESSION['mojeimie'])) {
    $_SESSION['mojeimie'] = $_GET['name'];

//
// } else {
//     $_SESSION['mojeimie'] = $_GET['name'];
// }



    // zmienna $dane, która będzie zapisana
// może także pochodzić z formularza np. $dane = $_POST['dane'];
$dane = $_GET['score'].",".$_GET['name']."\n";

// przypisanie zmniennej $file nazwy pliku
$file = "lista.csv";

// uchwyt pliku, otwarcie do dopisania
$fp = fopen($file, "a");

// blokada pliku do zapisu
flock($fp, 2);

// zapisanie danych do pliku
fwrite($fp, $dane);

// odblokowanie pliku
flock($fp, 3);

// zamknięcie pliku
fclose($fp);
} else {
    // die('nie dziala');
}

$plik = file_get_contents("lista.csv");

$plik = explode("\n", $plik);

for($i=0; $i<count($plik)-1; ++$i) {
   $out[$i] = explode(",", $plik[$i]);
}
array_multisort($out, SORT_DESC);
$out = array_slice($out, 0, 10);
echo json_encode($out);

die();

?><table><?php
for ($j=0; $j <= 10; $j++) {?><tr><?php
    for ($k=0; $k < 2 ; $k++) {
        ?><td><?php print_r($out[$j][$k]); ?></td> <?php
    } ?></tr><?php
}

 ?>
</table>
