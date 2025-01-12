<!DOCTYPE html>
<html lang="en">
<head>
    <title>TP1</title>
    <meta charset="UTF-8">
    <style>
        h1 {
            font-size: 30pt;
            font-family: "Arial Black";
            text-align: center;
            color: black;
        }
        h2 {
            color: #454343;
        }
        .contenu {
            margin-bottom: 30px;
        }
        body {
            background-color: #cabdbd;
            margin: 20px;
        }
        pre, .out {
            background-color: rgba(37, 67, 23, 0.38);
            border: 1px solid #333;
            border-radius: 6px;
            padding: 10px;
            font-size: 14pt;
            overflow: auto;
        }
        .out {
            margin-bottom: 14px;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
            font-family: Arial;
            background-color: #dcd3d3;
            border-radius: 15px;
        }
        tr:nth-child(even) {
            background-color: darkgray;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #254317;
            color: white;
        }
    </style>
</head>
<body>
<h1>TP : Manipulation des tableaux en PHP</h1>

<div class="contenu">
    <h2>1 - Création d'un tableau</h2>
    <p>
    <ul>
        <li>Créer un tableau PHP contenant les noms des étudiants.</li>
        <li>Afficher ce tableau à l'aide de la fonction "print_r".</li>
    </ul>
    </p>
    <?php
    $big = array(1111 => "Karim", 2222 => "Marwa", 3333 => "Aya", 4444 => "Mohammed", 5555 => "Fatima");
    echo "<div class='out'><strong>Tableau résultant :</strong><br>";
    echo "<table><tr><th>ID</th><th>Nom</th></tr>";
    foreach ($big as $cle => $item) {
        echo "<tr><td>$cle</td><td>$item</td></tr>";
    }
    echo "</table></div>";
    ?>
</div>

<div class="contenu">
    <h2>2 - Ajouter un élément au tableau</h2>
    <p>
    <ul>
        <li>Ajouter un nouvel étudiant à la fin du tableau.</li>
        <li>Afficher à nouveau le tableau après cette opération.</li>
    </ul>
    </p>
    <?php
    $big[6666] = "Sylus";  // Ajout d'un élément avec une nouvelle clé
    echo "<div class='out'><strong>Tableau résultant :</strong><br>";
    echo "<table><tr><th>ID</th><th>Nom</th></tr>";
    foreach ($big as $cle => $item) {
        echo "<tr><td>$cle</td><td>$item</td></tr>";
    }
    echo "</table></div>";
    ?>
</div>

<div class="contenu">
    <h2>3 - Supprimer un élément du tableau</h2>
    <p>
    <ul>
        <li>Supprimer l'étudiant "Karim" du tableau.</li>
        <li>Afficher à nouveau le tableau après suppression.</li>
    </ul>
    </p>
    <?php
    unset($big[1111]);
    echo "<div class='out'><strong>Tableau résultant :</strong><br>";
    echo "<table><tr><th>ID</th><th>Nom</th></tr>";
    foreach ($big as $cle => $item) {
        echo "<tr><td>$cle</td><td>$item</td></tr>";
    }
    echo "</table></div>";
    ?>
</div>

<div class="contenu">
    <h2>4 - Rechercher un élément</h2>
    <p>
    <ul>
        <li>Vérifier si l'étudiant "Mohammed" est présent dans le tableau.</li>
        <li>Afficher un message indiquant si l'élément est trouvé ou non.</li>
    </ul>
    </p>
    <?php
    if (in_array("Mohammed", $big)) {
        echo "<div class='out'><strong>Résultat :</strong><br>Mohammed est dans le tableau.</div>";
    } else {
        echo "<div class='out'><strong>Résultat :</strong><br>Mohammed n'est pas dans le tableau.</div>";
    }
    ?>
</div>

<div class="contenu">
    <h2>5 - Modifier un élément</h2>
    <p>
    <ul>
        <li>Remplacer un étudiant dans le tableau.</li>
    </ul>
    </p>
    <?php
    $big[4444] = "Zayne";  // Modification de l'élément avec la clé 4444
    echo "<div class='out'><strong>Tableau résultant :</strong><br>";
    echo "<table><tr><th>ID</th><th>Nom</th></tr>";
    foreach ($big as $cle => $item) {
        echo "<tr><td>$cle</td><td>$item</td></tr>";
    }
    echo "</table></div>";
    ?>
</div>

</body>
</html>
