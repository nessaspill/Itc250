<?php
$temperature1 = filter_input(INPUT_POST, "temperature1", FILTER_VALIDATE_FLOAT);
$temperature2 = filter_input(INPUT_POST, "temperature2", FILTER_VALIDATE_FLOAT);
$temperature1Type = filter_input(INPUT_POST, "temperature1Type");
$temperature2Type = filter_input(INPUT_POST, "temperature2Type");

$errorMessage = "";

if (isset($temperature1)) {
    if (!$temperature1) {
        //input temperature is not of type float
        $temperature2 = "Error: invalid input";
    } else if ($temperature1Type == 'kelvin' && $temperature1 < 0) {
        //input temperature is a negative Kelvin value
        $temperature2 = "Error: negative Kelvin";
    } else {
        //calculate temperature conversion based on types
        switch ($temperature1Type) {
            case "celsius":
                switch ($temperature2Type) {
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
                switch ($temperature2Type) {
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
                switch ($temperature2Type) {
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
                echo "You should not be here! $temperature1Type";
                break;
        }

        //round 2 or more decimal numbers to 2 decimal places
        if (fmod($temperature2, 1.0) > 0)
            $temperature2 = number_format($temperature2, 2);
    }
}
