<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2 style="text-align: center">List Product</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Category Id</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created Day</th>
            <th>Update Day</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($productDetail as $vallue): ?>
            <tr>
                <td><?php print htmlentities($vallue->category_id); ?></td>
                <td><?php print htmlentities($vallue->description); ?></td>
                <td><img src="public/uploads/<?php print htmlentities($vallue->image); ?>" width="100" height="100" ></td>
                <td><?php print htmlentities($vallue->created_at); ?></td>
                <td><?php print htmlentities($vallue->updated_at); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>
