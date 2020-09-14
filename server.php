<?php
header("Access-Control-Allow-Methods: POST");


$questionCount = (int) $_POST["questionCount"];
$inputCount = (int) $_POST["inputCount"];
$results = array();
$columns = array();

for($i = 1; $i <= $questionCount; $i++){
    $columns[] = "Q" . $i;
    $results[] = $_POST["Q" . $i];
}

for($i = 1; $i <= $inputCount; $i++){
    $columns[] = "record" . $i;
    $results[] = $_POST["record" . $i];
}

$columns[] = "feedback";
$results[] = $_POST["feedback"];

$path = "result/result.csv";

if(!file_exists($path)){
    $file = fopen($path,"a");
    fputcsv($file, $columns);
    fclose($file);
}

$file = fopen($path,"a+");
fputcsv($file, $results);
fclose($file);


include 'header.html';
include 'final.html';