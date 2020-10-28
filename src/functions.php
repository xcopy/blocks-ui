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
function getRows(array $user): array {
    global $config;

    ['maxCols' => $maxCols] = $config;

    $blocks = array_map(fn (int $id): array => findBlock($id), $user['blocks']);

    $keys = ['prefer', 'max', 'min'];
    $keysCount = count($keys);

    $step = 0;

    $rows = [];

    foreach ($blocks as $block) {
        $current = $blocks[$step];
        $next = $blocks[$step+1];

        $row = null;

        if ($next) {
            for ($i = 0; $i < $keysCount; $i++) {
                for ($j = 0; $j < $keysCount; $j++) {
                    $key1 = $keys[$i];
                    $key2 = $keys[$j];

                    $num1 = $current['cols'][$key1];
                    $num2 = $next['cols'][$key2];

                    if ($num1 === $maxCols) {
                        $row = [
                            ['block' => $current, 'cols' => $num1]
                        ];

                        $j = $keysCount;
                        $i = $keysCount;
                        $step = $step + 1;
                    } else {
                        if ($num1 + $num2 === $maxCols) {
                            $row = [
                                ['block' => $current, 'cols' => $num1],
                                ['block' => $next, 'cols' => $num2]
                            ];

                            $j = $keysCount;
                            $i = $keysCount;
                            $step = $step + 2;
                        }
                    }
                }
            }

            if (! $row) {
                $row = [
                    ['block' => $current, 'cols' => null]
                ];

                $step = $step + 1;
            }
        } else {
            if ($current) {
                $row = [
                    ['block' => $current, 'cols' => null]
                ];

                $step = count($blocks);
            }
        }

        $row and array_push($rows, $row);
    }

    return $rows;
}
