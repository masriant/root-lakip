<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?> | LAKIP</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->

    <!-- CSS Bootstrap@5.3.1 -->
    <link rel="stylesheet" href="/assets/bootstrap-5.3.1/css/bootstrap.min.css">
</head>

<body>
    <!-- Nav Start-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('/pages'); ?>">LAKIP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('/pages'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/pages/profile'); ?>">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/pages/about'); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/pages/contact'); ?>">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Nav End -->