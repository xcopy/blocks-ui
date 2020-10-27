<?php

return [
    'blocks' => [
        [
            'id' => 1,
            'title' => 'Patient',
            'cols' => [
                'min' => 6,
                'max' => 7,
                'prefer' => 7
            ]
        ],
        [
            'id' => 2,
            'title' => 'Employment',
            'cols' => [
                'min' => 5,
                'max' => 6,
                'prefer' => 5
            ]
        ],
        [
            'id' => 3,
            'title' => 'Benefits',
            'cols' => [
                'min' => 6,
                'max' => 12,
                'prefer' => 12
            ]
        ]
    ],
    'users' => [
        [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'blocks' => [1, 3]
        ],
        [
            'id' => 2,
            'name' => 'Jane Doe',
            'email' => 'jane.doe@gmail.com',
            'blocks' => [1, 2, 3]
        ]
    ]
];
