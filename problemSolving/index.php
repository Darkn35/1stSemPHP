<html>
    <?php include 'server.php'; ?>
    <head>
        <title>Problem Solving</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="main.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="main.js"></script>
    </head>
    <body>
        <div id="mainOptions">
            <div class="row">
                <div class="col vertCard">
                    <h1 id="option1" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>1</h1>
                </div>
                <div class="col vertCard">
                    <h1 id="option2" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>2</h1>
                </div>
                <div class="col vertCard">
                    <h1 id="option3" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>3</h1>
                </div>
                <div class="col vertCard">
                    <h1 id="option4" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>4</h1>
                </div>
                <div class="col vertCard">
                    <h1 id="option5" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>5</h1>
                </div>
                <div class="col vertCard">
                    <h1 id="option6" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>6</h1>
                </div>  
                <div class="col vertCard">
                    <h1 id="option7" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>7</h1>
                </div>
                <div class="col vertCard">
                    <h1 id="option8" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>8</h1>
                </div>
                <div class="col vertCard">
                    <h1 id="option9" class="vertText">P<br>R<br>O<br>B<br>L<br>E<br>M<br>#<br>9</h1>
                </div>
            </div>
            <script src="main.js"></script>
        </div>
        <div id="content" class="container-fluid">
            <div id="option1_Choice" class="problemPage">
               <div class="problemContainer">
               <form>
		            <h1>Number to Words</h1>
			        <input type="number" id="numToWord" name="num" value="Enter a Number"/>			           
				    <button type="button" name="convert" onclick="sendReq(1, document.getElementById('numToWord').value, null, null)">Convert To Words!</button>    
                </form>
               </div> 
            </div>
            <div id="option2_Choice" class="problemPage">
                
                <div class="problemContainer">
                <form>
		            <h1>Roman Numeral Converter</h1>
			        <input type="number" id="numToRoman" name="num" value="Enter a Number"/>			           
				    <button type="button" name="convert" onclick="sendReq(2, document.getElementById('numToRoman').value, null, null)">Convert To Roman Numerals!</button>
                </form> 
                </div>
            </div>
            <div id="option3_Choice" class="problemPage">
                <div class="problemContainer">
                <form>
                    <h1>Bill Calculator</h1>
                    <label for="accNum">Account Number</label>
                    <input id="accNum" type="number" />
                    <label for="start">Enter the number of minutes</label>
                    <input id="start" type="number" name="minutes" placeHolder="" input="minutes">
                    <label for="service">Service</label>
                    <select id="service" name="Service">
                        <option value="regular">Choose an Option</option>
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                    </select>
				    <button type="button" name="convert" onclick="sendReq(3, document.getElementById('accNum').value, document.getElementById('start').value, document.getElementById('service').value)">Calculate!</button>
                </form>
                </div>       
            </div>
            <div id="option4_Choice" class="problemPage">
                <div class="problemContainer">
                <form>
		            <h1>Cost of Call Calculator</h1>
                    <label for="time_start">Time Call Started</label>
                    <input id="time_start" type="time" min="00:00" max="24:00" />
                    <label for="length_hour">Hour Length</label>
                    <input id="length_hour" type="number" min="0"/>
                    <label for="length_minute">Minute Length</label>
                    <input id="length_minute" type="number" min="0"/>
                    <button type="button" onclick="sendReq(4, document.getElementById('time_start').value, document.getElementById('length_hour').value, document.getElementById('length_minute').value)">Calculate!</button>
                </form>
                </div>     
            </div>
            <div id="option5_Choice" class="problemPage">
                <div class="problemContainer">
                <form>
		            <h1>Divisibility Checker</h1>
                    <label for="diviNum">Enter a Number: </label>
                    <input id="diviNum" type="number" min="10" max="10000"/>
                    <button type="button" onclick="sendReq(5, document.getElementById('diviNum').value, null, null)">Calculate!</button>
                </form>
                </div>     
            </div>
            <div id="option6_Choice" class="problemPage">
                <div class="problemContainer">
                <form>
                <h1>Simple Calculator</h1>
                <input id="firstVar_1" type="number" name="firstVar" placeHolder="">
                    <select id="operation_1" name="Operation">
                        <option value="addition">Add</option>
                        <option value="subtraction">Minus</option>
                        <option value="multiplication">Multiply</option>
                        <option value="division">Divide</option>
                    </select>
                    <input id="secondVar_1" type="number" name="secondVar" placeHolder="" step=".01">
                    <button type="button" id="calc" name="calculate" onclick="sendReq(6, document.getElementById('firstVar_1').value, document.getElementById('operation_1').value, document.getElementById('secondVar_1').value)">Calculate</button>
                </form>
                </div>
            </div>
            <div id="option7_Choice" class="problemPage">
                <div class="problemContainer">
                <form>
                <h1>Simple Decimal Calculator</h1>
                <input id="firstVar_2" type="number" name="firstVar" placeHolder="" step=".01">
                    <select id="operation_2" name="Operation">
                        <option value="addition">Add</option>
                        <option value="subtraction">Minus</option>
                        <option value="multiplication">Multiply</option>
                        <option value="division">Divide</option>
                    </select>
                    <input id="secondVar_2" type="number" name="secondVar" placeHolder="" step=".01">
                    <button type="button" id="calc" name="calculate" onclick="sendReq(7, document.getElementById('firstVar_2').value, document.getElementById('operation_2').value, document.getElementById('secondVar_2').value)">Calculate</button>
                </form>
                </div>
            </div>
            <div id="option8_Choice" class="problemPage">
                <div class="problemContainer">
                <form>
                    <h1>Quadrant Calculator</h1>
                    <label for="xCoord">X-Coordinate :</label>
                    <input type="number" id="xValue" name="xCoord" placeHolder="" step="any">
                    <label for="yCoord">Y-Coordinate :</label>
                    <input type="number" id="yValue" name="yCoord" placeHolder="" step="any">
                    <button type="button" id="search" name="search" onclick="sendReq(8, document.getElementById('xValue').value, document.getElementById('yValue').value, null)">Search</button>
                </form>
                </div>
            </div>
            <div id="option9_Choice" class="problemPage">
                <div class="problemContainer">
                <form>
                    <h1>Telephone Dial</h1>
                    <label for="character">Input a character :</label>
                    <input type="text" id="characterInput" name="character" pattern="[A-Za-z]+" placeHolder="" maxlength="1">
                    <button type="button" id="enter" name="enter" onclick="sendReq(9, document.getElementById('characterInput').value, null, null)">Enter</button>
                </form>
                </div>
                
            </div>
        </div>
    </body>
</html>