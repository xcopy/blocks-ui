<?php

$config = require_once __DIR__.'/config.php';
$data = require_once __DIR__.'/data.php';

function findBlock(int $id) {
    global $data;

    $i = array_search($id, array_column($data['blocks'], 'id'));

    return $data['blocks'][$i];
}

function getTotalCols(array $user, string $key) {
    $callback = function ($total, int $id) use ($key): int {
        $block = findBlock($id);
        $total += $block['cols'][$key];

        return $total;
    };

    return array_reduce($user['blocks'], $callback, 0);
}

function getBlocks(array $user) {
    global $data, $config;

    $userBlocksCount = count($user['blocks']);
    $totalBlocksCount = count($data['blocks']);

    $blocks = array_map(
        function (int $id): array {
            $block = findBlock($id);
            $cols = $block['cols']['prefer']; // by default

            return compact('block', 'cols');
        },
        $user['blocks']
    );

    ['minCols' => $minCols, 'maxCols' => $maxCols] = $config;

    $totalPreferCols = getTotalCols($user, 'prefer');
    $totalMinCols = getTotalCols($user, 'min');

    // var_dump($totalPreferCols, $totalMinCols);

    if ($userBlocksCount < $totalBlocksCount) {
        if ($totalPreferCols > $maxCols) {
            if ($totalMinCols > $maxCols) {
                // set the same width for each block
                // all of them will be evenly spaced
                $cols = ceil($maxCols / $userBlocksCount);
                $cols = $cols < $minCols ? $minCols : $cols;

                foreach ($blocks as &$arr) {
                    $arr['cols'] = $cols;
                }
            } elseif ($totalMinCols < $maxCols) {
                // ...
            } else {
                // set the minimum width for each block respectively
                foreach ($blocks as &$arr) {
                    ['block' => $block] = $arr;
                    $arr['cols'] = $block['cols']['min'];
                }
            }
        }
    }

    return $blocks;
}

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
    <?php foreach ($data['users'] as $user): ?>
        <h1 class="my-3"><?= $user['name'] ?></h1>

        <div class="row">
            <?php foreach (getBlocks($user) as $arr):
                ['block' => $block, 'cols' => $cols] = $arr;
            ?>

                <div class="col-<?= $cols ?>">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-uppercase d-inline-block mb-0">
                                <?= $block['title'] ?>
                            </h5>
                            <span>(col-<?= $cols ?>)</span>
                        </div>
                        <div class="card-body">
                            <?= $config['lorem'] ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <hr>
    <?php endforeach; ?>
</div>

</body>
</html>
