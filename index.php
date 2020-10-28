<?php

$config = require_once __DIR__.'/src/config.php';
$data = require_once __DIR__.'/src/data.php';
require_once __DIR__.'/src/functions.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Blocks UI</title>
    <style>
        .card {
            min-height: 300px;
        }
    </style>
</head>
<body class="m-3">

<div class="container-fluid">
    <?php foreach ($data['users'] as $user): ?>
        <h1 class="my-3"><?= $user['name'] ?></h1>

        <?php foreach (getRows($user) as $rows): ?>
            <div class="row">

                <?php foreach ($rows as $row):
                    ['block' => $block, 'cols' => $cols, 'key' => $key] = $row;
                    $class = is_null($cols) ? 'col' : 'col-'.$cols;
                ?>

                    <div class="<?= $class ?>">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="text-uppercase d-inline-block mb-0">
                                    <?= $block['id'] ?>. <?= $block['title'] ?>
                                </h5>
                                <span>(<?= $class ?>)</span>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php foreach ($block['cols'] as $k => $num): ?>
                                        <span class="<?= is_null($cols) ? 'text-muted' : ($key === $k ? 'text-success font-weight-bold' : 'text-muted') ?>"><?= $k ?>: <?= $num ?></span><?= $k !== 'prefer' ? ',' : '' ?>
                                    <?php endforeach; ?>
                                </p>
                                <?= $config['lorem'] ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <hr>
    <?php endforeach; ?>
</div>

</body>
</html>
