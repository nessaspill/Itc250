<?php include "includes/temperatures.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Temperature Conversion - Group2</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>

    <body>
        <main>
            <h1>Temperature Conversion</h1>
            <form action="" method="post">
                <div class="data">
                    <table>
                        <tr>
                            <td>
                                <?php 
                                    if ($temperature1 === NULL) {
                                        echo '<input type="text" name="temperature1" value="" autofocus>'; 
                                    } else { 
                                        echo '<input type="text" name="temperature1" value="' . $temperature1 . '" autofocus>';
                                    } 
                                ?>
                            </td>	
                            <td class="midle"> = </td>
                            <td>
                                <?php 
                                    echo '<input id="result" type="text" name="temperature2" value="' . $temperature2 . '" disabled>';
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <select name="temperature1Type">
                                    <?php 
                                        if ($temperature1Type == 'celsius') {
                                            echo '<option value="celsius" selected>Celsius</option>'; 
                                        } else { 
                                            echo '<option value="celsius">Celsius</option>'; 
                                        } 
                                    ?>	
                                    <?php 
                                        if ($temperature1Type == 'kelvin') { 
                                            echo '<option value="kelvin" selected>Kelvin</option>'; 
                                        } else { echo '<option value="kelvin">Kelvin</option>'; 
                                        } 
                                    ?>	
                                    <?php 
                                        if ($temperature1Type == 'fahrenheit') {
                                            echo '<option value="fahrenheit" selected>Fahrenheit</option>'; 
                                        } else { 
                                            echo '<option value="fahrenheit">Fahrenheit</option>';
                                        } 
                                    ?>	
                                </select>
                            </td>
                            <td class="midle">--></td>
                            <td>
                                <select name="temperature2Type">
                                    <?php 
                                        if ($temperature2Type == 'celsius') {
                                            echo '<option value="celsius" selected>Celsius</option>'; 
                                        } else { 
                                            echo '<option value="celsius">Celsius</option>'; 
                                        } 
                                    ?>	
                                    <?php 
                                        if ($temperature2Type == 'kelvin') { 
                                            echo '<option value="kelvin" selected>Kelvin</option>'; 
                                        } else { echo '<option value="kelvin">Kelvin</option>'; 
                                        } 
                                    ?>	
                                    <?php 
                                        if ($temperature2Type == 'fahrenheit') {
                                            echo '<option value="fahrenheit" selected>Fahrenheit</option>'; 
                                        } else { 
                                            echo '<option value="fahrenheit">Fahrenheit</option>'; 
                                        } 
                                    ?>	
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Calculate"></td>
                        </tr>
                    </table>
                </div>

                <!--div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Calculate"><br>
                </div-->
            </form>
        </main>
    </body>
</html>
