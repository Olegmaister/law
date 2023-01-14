<?php

return [
    'i18n' => [
        'type' => 2,
        'children' => [
            'i18n-read',
            'i18n-write',
            'language-i18n',
            'faq-i18n',
            'meta-i18n',
            'review-i18n',
            'support-i18n',
            'practice-i18n',
            'example-i18n',
            'text-i18n',
        ],
    ],
    'i18n-read' => [
        'type' => 2,
    ],
    'i18n-write' => [
        'type' => 2,
    ],
    'site' => [
        'type' => 2,
        'children' => [
            'site-read',
        ],
    ],
    'site-read' => [
        'type' => 2,
    ],
    'language' => [
        'type' => 2,
        'children' => [
            'language-read',
            'language-i18n',
            'language-write',
        ],
    ],
    'language-read' => [
        'type' => 2,
    ],
    'language-i18n' => [
        'type' => 2,
        'children' => [
            'language-read',
        ],
    ],
    'language-write' => [
        'type' => 2,
        'children' => [
            'language-i18n',
        ],
    ],
    'faq' => [
        'type' => 2,
        'children' => [
            'faq-read',
            'faq-i18n',
            'faq-write',
        ],
    ],
    'faq-read' => [
        'type' => 2,
    ],
    'faq-i18n' => [
        'type' => 2,
        'children' => [
            'faq-read',
        ],
    ],
    'faq-write' => [
        'type' => 2,
        'children' => [
            'faq-i18n',
        ],
    ],
    'meta' => [
        'type' => 2,
        'children' => [
            'meta-read',
            'meta-i18n',
            'meta-write',
        ],
    ],
    'meta-read' => [
        'type' => 2,
    ],
    'meta-i18n' => [
        'type' => 2,
        'children' => [
            'meta-read',
        ],
    ],
    'meta-write' => [
        'type' => 2,
        'children' => [
            'meta-i18n',
        ],
    ],
    'review' => [
        'type' => 2,
        'children' => [
            'review-read',
            'review-i18n',
            'review-write',
        ],
    ],
    'review-read' => [
        'type' => 2,
    ],
    'review-i18n' => [
        'type' => 2,
        'children' => [
            'review-read',
        ],
    ],
    'review-write' => [
        'type' => 2,
        'children' => [
            'review-i18n',
        ],
    ],
    'support' => [
        'type' => 2,
        'children' => [
            'support-read',
            'support-i18n',
            'support-write',
        ],
    ],
    'support-read' => [
        'type' => 2,
    ],
    'support-i18n' => [
        'type' => 2,
        'children' => [
            'support-read',
        ],
    ],
    'support-write' => [
        'type' => 2,
        'children' => [
            'support-i18n',
        ],
    ],
    'practice' => [
        'type' => 2,
        'children' => [
            'practice-read',
            'practice-i18n',
            'practice-write',
        ],
    ],
    'practice-read' => [
        'type' => 2,
    ],
    'practice-i18n' => [
        'type' => 2,
        'children' => [
            'practice-read',
        ],
    ],
    'practice-write' => [
        'type' => 2,
        'children' => [
            'practice-i18n',
        ],
    ],
    'example' => [
        'type' => 2,
        'children' => [
            'example-read',
            'example-i18n',
            'example-write',
        ],
    ],
    'example-read' => [
        'type' => 2,
    ],
    'example-i18n' => [
        'type' => 2,
        'children' => [
            'example-read',
        ],
    ],
    'example-write' => [
        'type' => 2,
        'children' => [
            'example-i18n',
        ],
    ],
    'text' => [
        'type' => 2,
        'children' => [
            'text-read',
            'text-i18n',
            'text-write',
        ],
    ],
    'text-read' => [
        'type' => 2,
    ],
    'text-i18n' => [
        'type' => 2,
        'children' => [
            'text-read',
        ],
    ],
    'text-write' => [
        'type' => 2,
        'children' => [
            'text-i18n',
        ],
    ],
    'sys' => [
        'type' => 2,
    ],
    'layout' => [
        'type' => 2,
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'site',
            'language',
            'faq',
            'meta',
            'review',
            'support',
            'practice',
            'example',
            'text',
            'sys',
            'layout',
        ],
    ],
    'translator' => [
        'type' => 1,
        'children' => [
            'i18n',
        ],
    ],
    'stat' => [
        'type' => 1,
        'children' => [
            'support',
        ],
    ],
];
