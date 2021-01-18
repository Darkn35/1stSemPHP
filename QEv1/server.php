<?php
// check if post request is send from client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // check if input fields are empty
    if(count(array_filter($_POST))!=count($_POST)){
        echo "Error: One or more input fields are empty";
    }
    else {
        // get variables from ajax dataset
        // midterm vars
        $quiz_1m = $_POST['quiz_1m'];
        $quiz_2m = $_POST['quiz_2m'];
        $lab_1m = $_POST['lab_1m'];
        $lab_2m = $_POST['lab_2m'];
        $attM = $_POST['attM'];
        $examM = $_POST['examM'];

        // finals vars
        $quiz_1f = $_POST['quiz_1f'];
        $quiz_2f = $_POST['quiz_2f'];
        $lab_1f = $_POST['lab_1f'];
        $lab_2f = $_POST['lab_2f'];
        $attF = $_POST['attF'];
        $examF = $_POST['examF'];

        // computation
        $ave_quizM = ($quiz_1m + $quiz_2m) / 2;
        $ave_labM = ($lab_1m + $lab_2m) / 2;
        $class_partM = (($ave_quizM * 0.4) + ($ave_labM * 0.5) + ($attM * 0.1));
        $midterm_grade = ($class_partM * 0.6) + ($examM * 0.4);

        $ave_quizF = ($quiz_1f + $quiz_2f) / 2;
        $ave_labF = ($lab_1f + $lab_2f) / 2;
        $class_partF = (($ave_quizF * 0.4) + ($ave_labF * 0.5) + ($attF * 0.1));
        $final_grade = ($class_partF * 0.6) + ($examF * 0.4);

        $sem_grade = ($midterm_grade * 0.5) + ($final_grade * 0.5);

        // inputting grades more than 100
        if ($sem_grade > 100){
            echo "Error: Only input grades from 50 - 100";
        }
        else {
            // return data to ajax
            echo 'Semestral Grade: '.$sem_grade.''; 
        }
    }
}
