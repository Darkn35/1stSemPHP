<!DOCTYPE html>
<?php include 'main.php'; ?>
<html>
<head>
    <title>CSS</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="textFuncs.js"></script>    
    <script type="module" src="main.js"></script>
</head>
<body>
    <div id="here"></div>
    <div id="sceneBG">
        <div id="titles" class="col-6">
            <h1 id="text">Welcome to our Site</h1>
            <h5 class="textLight flashing">[click and scroll to navigate]</h5>
        </div>
    </div>
    <div id="textContent" class="container-fluid">
        <div class="row">
            <div id="descLeft" class="col-3 floating">
                <img src="" id="pf">
                <h1 id="name" class="textDesc "></h1>
                <h2 id="desc" class="textDesc "></h2>
            </div>
            <div class="col-6" id="midBlock"></div>
            <div id="descRight" class="col-3 floating">
                <h1 id="ach" class="textDesc"></h1>
            </div>
        </div>
    </div>
    <div id="forms">
        <div id="phpControls">
            
        </div>
    </div>
</body>
</html>