<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:600,700" rel="stylesheet">
	<title>CALCULATOR</title>
</head>
<body>
	<div id="container">
		<div id="calculator">
            <?php
            //var_export($_POST);
            //echo "<br>";
            $buttons=[1,2,3,'+',4,5,6,'-',7,8,9,'*','C',0,'.','/','=','CE'];
            $pressed='';
            if(isset($_POST['pressed']) && in_array($_POST['pressed'],$buttons)){
                $pressed=$_POST['pressed'];
            }
            $stored='';
            if(isset($_POST['stored']) && preg_match('~^(?:[\d.]+[*/+-]?)+$~',$_POST['stored'],$out)){
                $stored=$out[0];    
            }
            $display=$stored.$pressed;
            //echo $pressed & $stored & $display;
            if($pressed=='C'){
                $display='';
            }
            elseif ($pressed=='CE'){
                $display = substr_replace($stored ,"",-1);
            }
            elseif($pressed=='=' && preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~',$stored)){
                $display.=eval("return $stored;");
            }
            echo "<form action=\"\" method=\"POST\">";
                echo '<div id="result">';
                    echo "<input type=\"text\" type=\"submit\" id=\"resultCalculator\" name=\"stored\" value=\"$display\"><br>";
                echo '</div>';
                echo "<div id=\"keyboard\">";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"C\" class=\"operator\">C</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"CE\" class=\"operator\">CE</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"\" class=\"empty\"></button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"/\" class=\"operator\">/</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"7\" class=\"number\">7</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"8\" class=\"number\">8</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"9\" class=\"number\">9</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"*\" class=\"operator\">*</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"4\" class=\"number\">4</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"5\" class=\"number\">5</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"6\" class=\"number\">6</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"-\" class=\"operator\">-</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"1\" class=\"number\">1</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"2\" class=\"number\">2</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"3\" class=\"number\">3</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"+\" class=\"operator\">+</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"\" class=\"empty\"></button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"0\" class=\"number\">0</button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"\" class=\"empty\"></button>";
                    echo "<button type=\"submit\" name=\"pressed\" value=\"=\" class=\"operator\">=</button>";
                echo '</div>';
            echo "</form>";
            ?>
		</div>
	</div>
</body>
</html>