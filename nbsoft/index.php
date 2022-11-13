<?php require 'view/head.php'; ?>
<?php //require 'connection/TableConnectionData.php'; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Tasks:</a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="task/cv.html">CV <span class="sr-only">(HTML)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="task/form.php">Form</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="task/gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="task/ScanFolder.php">Folder scan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="task/TableData.php">Information about users</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="jumbotron text-center">
                <h2>Welcome</h2>
            </div>
        </div>
    </div>
<?php require 'view/body.php'; ?>