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
        ],
        [
            'id' => 4,
            'title' => 'Medical History',
            'cols' => [
                'min' => 6,
                'max' => 12,
                'prefer' => 12
            ]
        ],
        [
            'id' => 5,
            'title' => 'Awesome Block 1',
            'cols' => [
                'min' => 4,
                'max' => 6,
                'prefer' => 6
            ]
        ],
        [
            'id' => 6,
            'title' => 'Awesome Block 2',
            'cols' => [
                'min' => 5,
                'max' => 8,
                'prefer' => 6
            ]
        ],
        [
            'id' => 7,
            'title' => 'Awesome Block 3',
            'cols' => [
                'min' => 7,
                'max' => 8,
                'prefer' => 7
            ]
        ]
    ],
    'users' => [
        [
            'id' => 1,
            'name' => 'User 1',
            'blocks' => [1, 4, 6, 7]
        ],
        [
            'id' => 2,
            'name' => 'User 2',
            'blocks' => [1, 3, 5]
        ],
        [
            'id' => 3,
            'name' => 'User 3',
            'blocks' => [1, 2, 4, 6]
        ]
    ]
];
