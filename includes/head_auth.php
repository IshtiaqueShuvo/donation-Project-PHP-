<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 05-09-19
 * Time: 22.19
 */

$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Donation System</title>

    <!-- Custom fonts for this template-->
    <link href="/<?php echo $ressourceRoot ?>/resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/<?php echo $ressourceRoot ?>/resources/css/sb-admin.css" rel="stylesheet">


    <script src="/<?php echo $ressourceRoot ?>/resources/vendor/jquery/jquery.min.js"></script>
</head>
<body class="bg-dark">
