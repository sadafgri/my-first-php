<?php
$error = '';
$id = $_REQUEST['id'];
$fname = strlen($_REQUEST['firstname']) < 40 ? $_REQUEST['firstname'] : $error = 'error in fname';
$lname = strlen($_REQUEST['lastname']) < 40 ? $_REQUEST['lastname'] : $error = 'error in lname';
$phonenum = strlen($_REQUEST['phonenumber']) <= 11 ? $_REQUEST['phonenumber'] : $error = 'error in phone number';
$age = $_REQUEST['age'] > 18 ? $_REQUEST['age'] : $error = 'you have to be older than 18 to submit';
$pass = md5($_REQUEST['pass']);
$gendr = $_REQUEST['gender'];
if ($error != '') {
    echo 'you have an error';
}
$file = 'users.text';
$olddata = file_get_contents($file);
$olddata .= "array('id'=>$id,'firstname'=>$fname,'lastname'=>$lname,'phonenumber'=>$phonenum,'age'=>$age,'pass'=>$pass,'gender'=> $gendr)";
file_put_contents($file,$olddata);
