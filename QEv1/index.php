<?php include 'server.php'; ?>
<html>
    <head>
        <title>Quarterly Exam</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="main.js"></script>
    </head>
    <body>
    <div class="container" id="container">
        <div id="mainInputs" class="container-fluid">
            <form>
                <div class="form-container grades-container">
                    <h1>Midterm Grades</h1>
                    <div class="row justify-content-center"> 
                        <label for="quiz_1m">Quiz 1 Grade: </label>
                        <input id="quiz_1m" type="number" min="50" max="100"/>
                        <label for="lab_1m">Lab 1 Grade: </label>
                        <input id="lab_1m" type="number" min="50" max="100"/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="quiz_2m">Quiz 2 Grade: </label>
                        <input id="quiz_2m" type="number" min="50" max="100"/>
                        <label for="lab_2m">Lab 2 Grade: </label>
                        <input id="lab_2m" type="number" min="50" max="100"/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="examM" class="col-1">Exam Grade: </label>
                        <input id="examM" type="number" min="50" max="100"/>
                        <label for="attM" class="col-1">Attendance Grade: </label>
                        <input id="attM" type="number" min="50" max="100"/>
                    </div>
                    <h1>Finals Grades</h1>
                    <div class="row justify-content-center">
                        <label for="quiz_1f">Quiz 1 Grade: </label>
                        <input id="quiz_1f" type="number" min="50" max="100"/>
                        <label for="lab_1f">Lab 1 Grade: </label>
                        <input id="lab_1f" type="number" min="50" max="100"/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="quiz_2f">Quiz 2 Grade: </label>
                        <input id="quiz_2f" type="number" min="50" max="100"/>
                        <label for="lab_2f">Lab 2 Grade: </label>
                        <input id="lab_2f" type="number" min="50" max="100"/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="examF" class="col-1">Exam Grade: </label>
                        <input id="examF" type="number" min="50" max="100"/>
                        <label for="attF" class="col-1">Attendance Grade: </label>
                        <input id="attF" type="number" min="50" max="100"/>
                    </div>
                    <!-- send ajax post request -->
                    <button class="button" type="button" id="calc" onclick="sendReq(document.getElementById('quiz_1m').value, document.getElementById('quiz_2m').value, document.getElementById('lab_1m').value, document.getElementById('lab_2m').value, 
                        document.getElementById('quiz_1f').value, document.getElementById('quiz_2f').value, document.getElementById('lab_1f').value, document.getElementById('lab_2f').value, 
                        document.getElementById('examM').value, document.getElementById('attM').value, document.getElementById('examF').value, document.getElementById('attF').value)">Calculate!
                    </button>
                </div>
            </form>   
        </div>
    </div>
    </body>
</html>