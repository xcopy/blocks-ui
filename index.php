<?php

$config = require_once __DIR__.'/config.php';
$data = require_once __DIR__.'/data.php';

$totalBlocksCount = count($data['blocks']);
$maxBlocks = $config['maxCols'] / $config['minCols']; // max blocks per row

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

<?php foreach ($data['users'] as $user): ?>
    <?php $userBlocksCount = count($user['allowedBlocks']); ?>

    <h1 class="my-3">
        <?php echo $user['username'] ?>
    </h1>

    <div class="container-fluid">
        <div class="row">
            <?php foreach ($data['blocks'] as $i => $block): ?>

                <?php if (in_array($block['id'], $user['allowedBlocks'])): ?>

                    <div class="col-md-<?php echo $block['config']['prefer'] ?>">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="text-uppercase d-inline-block mb-0"><?php echo $block['title'] ?></h5>
                                <span>(col-md-<?php echo $block['config']['prefer'] ?>)</span>
                            </div>
                            <div class="card-body">
                                <?php echo $config['lorem'] ?>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>
    <hr>
<?php endforeach; ?>

</body>
</html>
