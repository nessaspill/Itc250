<?php
$temperature1 = filter_input(INPUT_POST, "temperature1",
							FILTER_VALIDATE_FLOAT);
$temperature1Type = filter_input(INPUT_POST, "temperature1Type");
$temperature2Type = filter_input(INPUT_POST, "temperature2Type");
if (isset($temperature1))
{
    switch ($temperature1Type)
    {
	    case "celsius":
		    switch ($temperature2Type)
    		{
	    		case "celsius":
		    		$temperature2 = $temperature1;
			    	break;
	    		case "kelvin":
                    $temperature2 = $temperature1 + 273.15;
			    	break;
	    		case "fahrenheit":
                    $temperature2 = (($temperature1 * 9) / 5) + 32;
			    	break;
    			default:
	    			break;
		    }
			break;
	    case "kelvin":
		    switch ($temperature2Type)
    		{
	    		case "celsius":
                    $temperature2 = $temperature1 - 273.15;
			    	break;
	    		case "kelvin":
		    		$temperature2 = $temperature1;
			    	break;
	    		case "fahrenheit":
                    $temperature2 = ((9 / 5) * ($temperature1 - 273.15)) + 32;
			    	break;
    			default:
	    			break;
		    }
			break;
	    case "fahrenheit":
		    switch ($temperature2Type)
    		{
	    		case "celsius":
                    $temperature2 = (5 / 9) * ($temperature1 - 32);
			    	break;
	    		case "kelvin":
                    $temperature2 = (($temperature1 - 32) * (5 / 9)) + 273.15;
			    	break;
	    		case "fahrenheit":
		    		$temperature2 = $temperature1;
			    	break;
    			default:
	    			break;
		    }
			break;
    	default:
	    	echo 'You should not be here!';
		    break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Temperature Conversion</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
    <h1>Temperature Conversion</h1>
        <form action="" method="post">

        <div id="data">
			
            <table>
                <tr>
<td><?php if ($temperature1 === NULL) { echo '<input type="text" name="temperature1" value="" autofocus>'; } else { echo '<input type="text" name="temperature1" value="' . $temperature1 . '" autofocus>'; } ?></td>					
                    <td> = </td>
                    <td><?php echo "$temperature2"; ?></td>
                </tr>
            
                <tr>
                    <td>
        				<select name="temperature1Type">
<?php if ($temperature1Type == 'celsius') { echo '<option value="celsius" selected>Celsius</option>'; } else { echo '<option value="celsius">Celsius</option>'; } ?>	
<?php if ($temperature1Type == 'kelvin') { echo '<option value="kelvin" selected>Kelvin</option>'; } else { echo '<option value="kelvin">Kelvin</option>'; } ?>	
<?php if ($temperature1Type == 'fahrenheit') { echo '<option value="fahrenheit" selected>Fahrenheit</option>'; } else { echo '<option value="fahrenheit">Fahrenheit</option>'; } ?>	
                        </select>
					</td>
                    <td>
					</td>
                    <td>
						<select name="temperature2Type">
<?php if ($temperature2Type == 'celsius') { echo '<option value="celsius" selected>Celsius</option>'; } else { echo '<option value="celsius">Celsius</option>'; } ?>	
<?php if ($temperature2Type == 'kelvin') { echo '<option value="kelvin" selected>Kelvin</option>'; } else { echo '<option value="kelvin">Kelvin</option>'; } ?>	
<?php if ($temperature2Type == 'fahrenheit') { echo '<option value="fahrenheit" selected>Fahrenheit</option>'; } else { echo '<option value="fahrenheit">Fahrenheit</option>'; } ?>	
                        </select>
					</td>
                </tr>
            </table>
			
			</div>
			
            <div id="buttons">
            
				<label>&nbsp;</label>
                <input type="submit" value="Calculate"><br>
				
			</div>
			
		</form>
	</main>
</body>
</html>
