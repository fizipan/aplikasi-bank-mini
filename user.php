<?php
session_start();
// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

require 'functions.php';

$users = query("SELECT * FROM users");


?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Management Users
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Users</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $row) : ?>
                        <tr class="odd gradeX">
                            <td><?= $i; ?></td>
                            <td><?= $row["username"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>