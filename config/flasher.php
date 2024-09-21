<?php

return [
    'plugins' => [
        'notyf' => [
            'scripts' => [
                '/vendor/flasher/flasher-notyf.min.js',
            ],
            'styles' => [
                '/vendor/flasher/flasher-notyf.min.css',
            ],
            'options' => [
                // Optional: Add global options here
                'dismissible' => true,
                'duration' => 2000,
                'position' => [
                    'x' => 'right',
                    'y' => 'top',
                ],
            ],
        ],
    ],
];