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
        <tr>
                <h2 style="text-align: center">List News</h2>
                <table class="table table-hover">
                    <thead>
            <th><a href="?orderby=title">Name</a></th>
            <th><a href="?orderby=created">Created Day</a></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($category as $vallue): ?>
            <tr>
                <td><?php print htmlentities($vallue->name); ?></a></td>
                <td><?php print htmlentities($vallue->created); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



</body>
</html>
