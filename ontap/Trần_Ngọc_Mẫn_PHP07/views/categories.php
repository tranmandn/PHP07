<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Categories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2 style="text-align: center">List Categories</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Created Day</th>
            <th>Update Day</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($category as $vallue): ?>
            <tr>
                <td><?php print htmlentities($vallue->title); ?></a></td>
                <td><?php print htmlentities($vallue->created_at); ?></td>
                <td><?php print htmlentities($vallue->updated_at); ?></td>
                <td><a href="index.php?op=product&id=<?php print $vallue->id; ?>">product list of the category</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>
