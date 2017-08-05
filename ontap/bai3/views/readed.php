<!DOCTYPE html>
<html lang="en">
<head>
    <title>News</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center">List Readed News</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th><a href="?orderby=title">Title</a></th>
                <th><a href="?orderby=category_id">Category Id</a></th>
                <th><a href="?orderby=description">Description</a></th>
                <th><a href="?orderby=image">Image</a></th>
                <th><a href="?orderby=created">Created Day</a></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['readed'] as $vallue): ?>
            <?php   $image = htmlentities($vallue['image']);
                    $title = htmlentities($vallue['title']);
                    $category_id = htmlentities($vallue['category_id']);
                    $description = htmlentities($vallue['description']);
                    $created = htmlentities($vallue['created']);
            ?>
                <tr>
                    <td><?php print $title ?></td>
                    <td><?php print $category_id ?></td>
                    <td><?php print $description ?></td>
                    <td><img src='public/uploads/<?php print $image ?>' width='100' height='100'></td>
                    <td><?php print $created ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a style="float: right; margin-right: 100px;" href="index.php?op=erase" class="btn btn-primary">Erase Readed List</a>
</body>
</html>
