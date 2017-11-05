<?php

$days = array();
$months = array();

// Nombre de jour maximum pour chacun des mois de l'année. Bon OK ça sert à rien ici.
$days = [
    31,
    28,
    31,
    30,
    31,
    30,
    31,
    31,
    30,
    31,
    30,
    31
];

// On stock les mois dans un tableau
$months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];

// Première balise select pour les jours
echo '<select name="daysList">';

// On utilise un for classique en partan de 1 et allant jusqu'à 31
for ($i = 1; $i <= 31; $i++) {
    echo '<option value="day-'.$i.'">'.sprintf('%02d', $i).'</option>';
    // echo '<option value="day-'.$i.'">'.($i < 10 ? '0'.$i : $i).'</option>';
}

echo '</select>';


// Deuxième balise select pour les mois
echo '<select name="monthsList">';

// Cette fois ci on utilise une balise foreach très pratique pour parcourir un tableau
foreach ($months as $key => $value) {
    echo '<option value="month-'.($key+1).'">'.$value.'</option>';
}

echo '</select>';


// Dernière balise select pour les années
echo '<select name="yearsList">';

// De nouveau une loop for mais cette fois ci en commençant de date('Y') et en décrémentant jusqu'à 1900
for ($i = date('Y'); $i >= 1900; $i--) {
    echo '<option value="year-'.$i.'">'.$i.'</option>';
}

echo '</select>';
echo '<br><br><br>';


// Calcul de l'age en récupérant la valeur contenu dans l'input
if (isset($_GET['birthYear']) && !empty($_GET['birthYear']) && ($_GET['birthYear'] >= 0 && $_GET['birthYear'] <= date('Y'))) {
    $currentYear = date('Y');
    $birthYear = $_GET['birthYear'];

    $userAge = $currentYear - $birthYear;
}
else {
    $userAge = null;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Les boucles</title>
    </head>
    <body>
        <form method="get">
            <label for="inputBirthYear">Indiquez votre année de naissance : </label>
            <input id="inputBirthYear" type="text" name="birthYear" placeholder="année">
            <input type="submit" value="Calculer">
        </form>
        <?php if (!is_null($userAge)) { ?>
            <p>Vous avez présentement <?= $userAge?> ans.</p>
        <?php }
        else { ?>
            <p>Indiquez votre année de naissance et je vous donnerez votre âge.</p>
        <?php } ?>
    </body>
</html>
