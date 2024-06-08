<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KNN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        height: 100vh;
        overflow: hidden;
    }

    .sidebar {
        width: 250px;
        background-color: #343a40;
        color: #fff;
        display: flex;
        flex-direction: column;
        padding: 1rem;
    }

    .sidebar a {
        color: #fff;
        text-decoration: none;
        padding: 0.5rem 1rem;
        margin: 0.5rem 0;
        border-radius: 0.25rem;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    .main-content {
        flex-grow: 1;
        padding: 1rem;
        overflow-y: auto;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4>KNN - Algorithm</h4>
        <a href="dashboard.php">Home</a>
        <a href="dataset.php">Dataset</a>
        <a href="perhitungan.php">Perhitungan</a>
        <a href="#">Password</a>
        <a href="#">Logout</a>
    </div>