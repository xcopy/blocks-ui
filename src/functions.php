<?php

/**
 * @param int $id
 * @return array
 */
function findBlock(int $id): array {
    global $data;

    $i = array_search($id, array_column($data['blocks'], 'id'));

    return $data['blocks'][$i];
}

/**
 * @param array $user
 * @param string $key
 * @return int
 */
function getTotalCols(array $user, string $key): int {
    $callback = function ($total, int $id) use ($key): int {
        $block = findBlock($id);
        $total += $block['cols'][$key];

        return $total;
    };

    return array_reduce($user['blocks'], $callback, 0);
}

/**
 * @param array $user
 * @return array
 */
function getBlocks(array $user): array {
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

    if ($userBlocksCount < $totalBlocksCount) {
        if ($totalPreferCols > $maxCols) {
            // set the minimum width for each block respectively
            foreach ($blocks as &$arr) {
                ['block' => $block] = $arr;
                $arr['cols'] = $block['cols']['min'];
            }

            if ($totalMinCols > $maxCols) {
                // set the same width for each block
                // all of them will be evenly spaced
                $cols = ceil($maxCols / $userBlocksCount);
                $cols = $cols < $minCols ? $minCols : $cols;

                foreach ($blocks as &$arr) {
                    $arr['cols'] = $cols;
                }
            } else {
                // the width of the last block will be "auto" (i.e. just class="col")
                $blocks[count($blocks)-1]['cols'] = null;
            }
        }
    }

    return $blocks;
}
