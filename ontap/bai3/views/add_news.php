<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Add News</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="<?php print htmlentities($title) ?>"/>
            </div>
            <div class="form-group">
                <label for="category_id">Category_id:</label>
                <input type="number" class="form-control" name="category_id" value="<?php print htmlentities($category_id) ?>"/>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description"><?php print htmlentities($description) ?></textarea>
            </div>
                <input type="hidden" class="form-control" name="created" value="<?php echo date('Y-m-d h:i:sa') ?>"/>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image" value="<?php print htmlentities($image) ?>" />
            </div>
                <input type="hidden" class="form-control" name="form-submitted" value="1" />
                <input type="submit" class="btn btn-default" value="Submit" />
        </form>
    </div>
</div>

</body>
</html>