<?php
$temperature1 = filter_input(INPUT_POST, "temperature1", FILTER_VALIDATE_FLOAT);
$temperature1Type = filter_input(INPUT_POST, "temperature1Type");
$temperature2Type = filter_input(INPUT_POST, "temperature2Type");

if (isset($temperature1))
{
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
                echo 'You should not be here!';
                break;
    }
}

