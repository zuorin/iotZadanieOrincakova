<?php

$content = file_get_contents("parameters.json");
$parameters = json_decode($content, JSON_OBJECT_AS_ARRAY);

$hints = [
    0 => "",
    1 => "Hint1",
    2 => "Hint2",
    3 => "Hint3",
    4 => "Hint4",
    5 => "Hint5",
    6 => "Hint6"
];

?>
<html>
<head>
    <title>Tea Maker v0.1</title>
    <link rel="stylesheet" href="styles.css">
    <meta http-equiv="Refresh" content="5">
</head>
<body>
<section>
    <div>
        <h1 class="center">Tea Maker v0.1</h1>
        <div>
            <label for="form_first_name">Name:
                <?php
                echo $parameters['name'];
                ?>
            </label>
        </div>
        <div style="margin-bottom: 10px">
            <label for="form_last_name">Type:
                <?php
                echo $parameters['type'];
                ?>
            </label>
        </div>
        <br style="clear: both">
        <div class="borderBottom"></div>
    </div>
    <h2>Current Stats: </h2>
    <div>
        <div class="div50">
            <div class="stats">
                <span style="background-color: <?php echo $parameters['tPlaced'] == 1 ? "#77dd77" : "#ff6961"; ?> "
                      class="dot"></span>
                <label>Teapot Placed</label>
            </div>
        </div>
        <div class="div50">
            <div class="stats">
                <span style="background-color: <?php echo $parameters['minFluid'] == 1 ? "#77dd77" : "#ff6961"; ?> "
                      class="dot"></span>
                <label>Minfluid</label>
            </div>
        </div>
        <br style="clear: both">
    </div>
    <div>
        <div class="div50">
            <div class="stats">
                <span style="background-color: <?php echo $parameters['heater'] == 1 ? "#77dd77" : "#ff6961"; ?> "
                      class="dot"></span>
                <label>Heater</label>
            </div>
        </div>
        <div class="div50">
            <div class="stats">
                <span style="background-color: <?php echo $parameters['valve'] == 1 ? "#77dd77" : "#ff6961"; ?> "
                      class="dot"></span>
                <label>Valve</label>
            </div>
        </div>
        <br style="clear: both">
    </div>
    <div>
        <div class="div50">
            <div class="stats2">
                <span style="background-color: <?php echo $parameters['tReady'] == 1 ? "#77dd77" : "#ff6961"; ?> "
                      class="dot2"></span>
                <label style="font-size: 1.4em;">Tea Ready</label>
            </div>
        </div>
        <div class="div50">
            <div class="stats2">
                    <span style="background-color:
                    <?php
                    if ($parameters['temperature'] >= 80) {
                        echo "#ff6961";
                    } else if ($parameters['temperature'] >= 50) {
                        echo "#FBBB62";
                    } else {
                        echo "#B4CFEC";
                    }
                    ?>
                            " class="dot2"></span>
                <label style="font-size: 1.4em;">Temp:
                    <?php
                    echo $parameters['temperature'];
                    ?>
                    &#8451
                </label>
            </div>
            <br>
        </div>
        <br style="clear: both">
        <div class="borderBottom"></div>
    </div>
    <div>
        <h2>Hints: </h2>
        <div>
            <p style="padding: 0 35px; word-break: break-word;">
                <?php
                echo $hints[$parameters['hint']];
                ?>
            </p>
        </div>
    </div>
</section>
</body>
</html>