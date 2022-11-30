<?php

$form_keys = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'faculty',
    'message',
];

$faculties = [
    "fberg" => "Fakulta baníctva, ekológie, riadenia a geotechnológií",
    "hf" => "Fakulta materiálov, metalurgie a recyklácie",
    "sjf" => "Strojnícka fakulta",
    "fei" => "Fakulta elektrotechniky a informatiky",
    "svf" => "Stavebná fakulta",
    "ekf" => "Ekonomická fakulta",
    "fvt" => "Fakulta výrobných technológií",
    "fu" => "Fakulta umení",
    "lf" => "Letecká fakulta"
];

$form_data = [];
foreach ($form_keys as $key) {
    $form_data[$key] = isset($_POST[$key]) ? trim($_POST[$key]) : "";
}

$form_invalid = [];
if (!empty($_POST)) {
    foreach ($form_data as $key => $value) {
        if (trim($value) == "") {
            $form_invalid[] = $key;
        }
    }

    if (empty($form_invalid)) {

        $file1 = fopen("poziadavky.txt", "a+") or die("Unable to open file!");

        $text = "Dátum: " . date("d.m.Y H:i") . "\n";
        $text .= "Študent: " . $form_data['first_name'] . " " . $form_data['last_name'] . "\n";
        $text .= "Fakulta: " . $faculties[$form_data['faculty']] . "\n";
        $text .= "Telefón: " . $form_data['phone'] . "\n";
        $text .= "E-mail: " . $form_data['email'] . "\n";
        $text .= "Požiadavka: \n" . $form_data['message'] . "\n";
        $text .= "==========\n\n";
        
        fwrite($file1, $text);
        fclose($file1);

        foreach ($form_data as $key => $value) {
            $form_data[$key] = "";
        }

        echo "<div class=\"alert background_green\">Vaša požiadavka bola odoslaná.</div>";
    }
}

?>
<html>

<head>
    <title>TUKE Formulár</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        form {
            margin: 20px auto;
            border: 1px solid black;
            width: 600px;
            padding: 10px;
        }

        form div {
            display: block;
            width: 100%;
            padding: 5px;
        }

        .div50 {
            display: block;
            float: left;
            width: calc(50% - 10px);
        }

        .div100 {
            display: block;
            float: left;
            width: calc(100% - 10px);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="phone"],
        select,
        textarea {
            width: 100%;
            resize: none;
        }

        .invalid {
            border: 1px solid red;
        }

        .center {
            text-align: center;
        }

        .alert {
            width: 600px;
            margin: 20px auto;
            border: 1px solid black;
            padding: 10px;
        }

        .background_green {
            background-color: green;
            color: white;
        }

        .background_red {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <form action="index.php" method="POST">
        <div>
            <div class="div50">
                <label for="form_first_name">Meno</label>
                <input type="text" name="first_name" id="form_first_name" value="<?php echo $form_data['first_name']; ?>" class="<?php if (in_array("first_name", $form_invalid)) echo "invalid"; ?>" required="required">
            </div>
            <div class="div50">
                <label for="form_last_name">Priezvisko</label>
                <input type="text" name="last_name" id="form_last_name" value="<?php echo $form_data['last_name']; ?>" class="<?php if (in_array("last_name", $form_invalid)) echo "invalid"; ?>" required="required">
            </div>
            <br style="clear: both">
        </div>
        <div>
            <div class="div50">
                <label for="form_email">E-mail</label>
                <input type="email" name="email" id="form_email" value="<?php echo $form_data['email']; ?>" class="<?php if (in_array("name", $form_invalid)) echo "invalid"; ?>" required="required">
            </div>
            <div class="div50">
                <label for="form_phone">Telefón</label>
                <input type="phone" name="phone" id="form_phone" value="<?php echo $form_data['phone']; ?>" class="<?php if (in_array("phone", $form_invalid)) echo "invalid"; ?>" required="required">
            </div>
            <br style="clear: both">
        </div>
        <div>
            <div class="div100">
                <label for="">Fakulta</label>
                <select id="faculty" name="faculty" id="form_faculty">
                    <?php
                    foreach ($faculties as $shortcut => $faculty) {
                        echo "                <option value=\"" . $shortcut . "\"";
                        if ($form_data['faculty'] == $shortcut) echo " selected=\"selected\"";
                        echo ">" . $faculty . "</option>\n";
                    }
                    ?>
                </select>
            </div>
            <br style="clear: both">
        </div>
        <div>
            <div class="div100">
                <label for="form_message">Požiadavka</label>
                <textarea name="message" id="form_message" rows="5" class="<?php if (in_array("message", $form_invalid)) echo "invalid"; ?>" required="required"><?php echo htmlspecialchars($form_data['message']); ?></textarea>            
            </div>
            <br style="clear: both">
        </div>
        <div class="center">
            <input type="submit" value="Odoslať">
            <input type="reset" value="Vymazať">
            <br style="clear: both">
        </div>
    </form>
</body>

</html>