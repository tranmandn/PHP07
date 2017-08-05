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
        <h2 style="text-align: center">List News</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th><a href="?orderby=title">Title</a></th>
                <th><a href="?orderby=category_id">Category Id</a></th>
                <th><a href="?orderby=description">Description</a></th>
                <th><a href="?orderby=created">Created Day</a></th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($news as $vallue): ?>
                <tr>
                    <td><a href="index.php?op=show&id=<?php print $vallue->id; ?>"><?php print htmlentities($vallue->title); ?></a></td>
                    <td><?php print htmlentities($vallue->category_id); ?></td>
                    <td><?php print htmlentities($vallue->description); ?></td>
                    <td><?php print htmlentities($vallue->created); ?></td>
                    <td><img src="public/uploads/<?php print htmlentities($vallue->image); ?>" width="100" height="100" ></td>
                    <td><a href="index.php?op=readed&id=<?php print $vallue->id; ?>">Read</a> | <a href="index.php?op=delete&id=<?php print $vallue->id; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <center>
        <a href="index.php?op=new" class="btn btn-primary">Add New News</a>
        <a href="index.php?op=category" class="btn btn-primary">List category</a>
    </center>



</body>
</html>
