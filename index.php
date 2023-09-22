<?php
// require_once __DIR__ . "/Character.php";

require_once __DIR__ . "/Hero.php";
require_once __DIR__ . "/Orc.php";

//appel des objets Hero et Orc, donc appel de leur fichier respectif
$hero = new Hero(2000, 0, 'Fléau', 250, 'Bouclier', 600);
$orc = new Orc(500, 0);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Introduction POO</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6 text-center">
                <h2>Héro</h2>
                <p>Point de vie du héros : <?php echo $hero->getHealth() ?> </p>
                <p>Point de rage du héros : <?php echo $hero->getRage() ?> </p>
                <p>Arme du héros : <?php echo $hero->getWeapon() ?> </p>
                <p>Dégats de l'arme : <?php echo $hero->getWeaponDamage() ?> </p>
                <p>Armure du héros : <?php echo $hero->getShield() ?> </p>
                <p>Durabilité de l'armure : <?php echo $hero->getShieldValue() ?> </p>
            </div>
            <div class="col-6 text-center">
                <h2>Orc</h2>
                <p>Point de vie de l'orc : <?php echo $orc->getHealth() ?></p>
                <p>Point de rage de l'orc : <?php echo $orc->getRage() ?></p>
                <p>Dégats de l'orc : <?php echo $orc->getDamage() ?> </p>
            </div>
        </div>
    </div>

    <?php
    while ($hero->getHealth() > 0 && $orc->getHealth() > 0) {
        $orc->attack();

        echo 'L\'orc attaque le héros!<br>';
        echo 'Dégâts de l\'orc : ' . $orc->getDamage() . '<br>';
        echo 'Durabilité de l\'armure du héros : ' . $hero->getShieldValue() . '<br>';
        $damageTaken = $orc->getDamage() - $hero->getShieldValue();
        $damageTaken = max($damageTaken, 0); //permet à la valeur de ne pas être négative   
        echo 'Dégâts non absorbés : ' . $damageTaken . '<br>';

        $hero->setHealth($hero->getHealth() - $damageTaken);

        $hero->attacked($damageTaken);

        if ($hero->getRage() >= 100) {
            echo 'Le héros déclenche une attaque spéciale ! Il inflige : ' . $hero->getWeaponDamage() . ' points de dégats à l\'orc' . '<br>';
            $orc->setHealth($orc->getHealth() - $hero->getWeaponDamage());    
            $hero->setRage(0);       

        }

        echo 'Rage du héros : ' . $hero->getRage() . '<br>';
        echo 'Santé restante du héros : ' . $hero->getHealth() . '<br>';
        echo 'Santé de l\'orc : ' . $orc->getHealth() . '<br><br>';
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>