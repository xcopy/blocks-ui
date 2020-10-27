<?php

return [
    'blocks' => [
        1 => [
            'title' => 'Patient',
            'type' => 'success',
            'config' => [
                'min' => 6,
                'max' => 7,
                'prefer' => 7
            ]
        ],
        2 => [
            'title' => 'Employment',
            'config' => [
                'min' => 5,
                'max' => 5,
                'prefer' => 5
            ]
        ],
        3 => [
            'title' => 'Benefits',
            'config' => [
                'min' => 6,
                'max' => 12,
                'prefer' => 12
            ]
        ]
    ],
    'users' => [
        1 => [
            'username' => 'john_doe',
            'email' => 'john.doe@gmail.com',
            'allowedBlocks' => [1, 2, 3]
        ],
        2 => [
            'username' => 'jane_doe',
            'email' => 'jane.doe@gmail.com',
            'allowedBlocks' => [1, 3]
        ]
    ]
];
