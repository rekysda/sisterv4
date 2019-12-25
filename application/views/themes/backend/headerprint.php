<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/themes/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/themes/backend/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/themes/backend/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/themes/backend/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/themes/backend/dist/css/skins/_all-skins.min.css') ?>">
  <style>
.table-borderless td,
.table-borderless th {
    border: 0;
}
body{
    font-family: "Times New Roman", Times, serif;}
table#tablestd{
	border-width: 1px;
	border-style: solid;
	border-color: #D8D8D8;
	border-collapse: collapse;
	margin: 10px 0px;
}
table#tablestd td{
	padding: 0.5em; 	color: #000;
	vertical-align: top;
	border-width: 0px;
	padding: 4px;
	border: 1px solid #000;
	
}

table#tablemodul1{
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
	margin: 10px 0px;
}
table#tablemodul1 td{
	padding:1px 6px 2px 6px;
	border: 1px solid #000; 
	
}

table#tablemodul1 th{
	padding:1px 6px 2px 6px;
	border: 1px solid #000; 
	
}

h1{

    font-family: "Times New Roman", Times, serif;
	font-size:26px;
}
</style>