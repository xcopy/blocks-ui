<?php

$config = require_once __DIR__.'/config.php';
$data = require_once __DIR__.'/data.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./bootstrap.css">
    <title>Blocks UI</title>
    <style>
        .card {
            min-height: 300px;
        }
    </style>
</head>
<body class="m-3">

    <div class="container-fluid">
        <div class="row">
            <?php foreach ($data['blocks'] as $block): ?>
                <div class="col-md-<?php echo $block['config']['prefer'] ?>">
                    <div class="card mb-3">
                        <div class="card-header text-uppercase"><?php echo $block['title'] ?></div>
                        <div class="card-body"><?php echo $config['lorem'] ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
