<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php print $news->title; ?></title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
<h1><?php print $news->title; ?></h1>
<div>
    <span class="label">description:</span>
    <?php print $news->description; ?>
</div>
<div>
    <span class="label">category_id:</span>
    <?php print $news->category_id; ?>
</div>
<div>
    <span class="label">image:</span>
    <?php print $news->image; ?>
</div>
</body>
</html>
