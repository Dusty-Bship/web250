<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asgn02 Inheritance</title>
</head>
<body>
<h1>Inheritance Examples Before create()</h1>

<?php 
    include 'Bird.php';
    
    $bird = new Bird;
    echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';

    $fly_catcher = new YellowBelliedFlyCatcher;
    echo '<p>The song of the ' . $fly_catcher->name . ' on breeding grounds is "' . $fly_catcher->song . '".</p>';

    $kiwi = new Kiwi;
    $kiwi->flying = "no";
    echo "<p>The " . $fly_catcher->name . " " . $fly_catcher->can_fly() . ".</p>";
    echo "<p>The " . $kiwi->name . " " . $kiwi->can_fly() . ".</p>";    
    
    echo 'There is currently ' . Bird::$instance_count . ' instances of birds</br>';
    echo 'There is currently ' . YellowBelliedFlyCatcher::$instance_count . ' instances of fly catcher</br>';
    echo 'There is currently ' . Kiwi::$instance_count . ' instances of kiwi</br>';
    
?>

<h1>Inheritance Examples Using create()</h1>

<?php
    Bird::create();
    YellowBelliedFlyCatcher::create();
    Kiwi::create();

    echo 'There is currently ' . Bird::$instance_count . ' instances of birds</br>';
    echo 'There is currently ' . YellowBelliedFlyCatcher::$instance_count . ' instances of fly catcher</br>';
    echo 'There is currently ' . Kiwi::$instance_count . ' instances of kiwi</br>';
?>

</body>
</html>

