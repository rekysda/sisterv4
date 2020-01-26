<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= $title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/themes/frontend/css/bootstrap.min.css') ?>" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        html,
body {
	height: 100%;
	/* background-color: #3c8dbc; */
    background: url(assets/themes/frontend/images/bg.jpg);
    background-color: blue;
  background-blend-mode: lighten;
}

body {
	display: -ms-flexbox;
	display: flex;
	color: #fff;
	text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
}

.cover-container {
	max-width: 42em;
}
    </style>
    <!-- Custom styles for this template -->
</head>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">