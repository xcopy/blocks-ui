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
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'blocks' => [1, 3, 4, 5, 7]
        ],
        [
            'id' => 2,
            'name' => 'Jane Doe',
            'email' => 'jane.doe@gmail.com',
            'blocks' => [1, 2, 3, 4]
        ]
    ]
];
