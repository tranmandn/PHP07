<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product of Categories0</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2 style="text-align: center">Product of Categories</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($product as $vallue): ?>
            <tr>
                <td><?php print htmlentities($vallue->description); ?></td>
                <td><img src="public/uploads/<?php print htmlentities($vallue->image); ?>" width="100" height="100" ></td>
                <td><a href="index.php?op=detail&id=<?php print $vallue->id; ?>">List Product</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>
