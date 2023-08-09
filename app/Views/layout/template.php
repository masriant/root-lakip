<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?> | LAKIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- CSS Bootstrap@5.3.1 -->
    <!-- <link rel="stylesheet" href="/assets/bootstrap-5.3.1/css/bootstrap.min.css"> -->
    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <!-- Nav Start-->
    <?= $this->include('layout/navbar'); ?>
    <!-- Nav End -->

    <?= $this->renderSection('content'); ?>


    <!-- Footer Start-->
    <!-- JS Bootstrap@5.3.1 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- <script src="/assets/bootstrap-5.3.1/js/bootstrap.bundle.min.js"></script> -->
    <!-- Footer End-->
</body>

</html>