<?php

use Fw\Core\Application;
use Fw\Core\Validator;

include './fw/init.php';

$app = Application::getInstance();
$app->header();

$app->includeComponent(
    'interface.form',
    'default',
    [
        'additional_class' => 'my-form',
        'attr' => ['data-form-id' =>'form-123'],
        'method' => 'post',
        'action' => '/',
        'elements' => [
            [
                'type' => 'text',
                'name' => 'login',
                'title' => 'Логин',
                'default' => 'Введите логин'
            ],
            [
                'type' => 'number',
                'name' => 'age',
                'title' => 'Возраст',
                'default' => 'Введите возраст',
                'additional_class' => 'form-control',
            ],
            [
                'type' => 'password',
                'name' => 'password',
                'title' => 'Пароль',
                'default' => 'Введите пароль',
                'additional_class' => 'form-control',
            ],
            [
                'type' => 'checkbox',
                'name' => 'iagree',
                'title' => 'Согласен с условиями',
                'additional_class' => 'form-check-input',
                'attr' => ['data-id' => '18'],
            ],
            [
                'type' => 'select',
                'name' => 'server',
                'attr' => ['data-id' => '17'],
                'title' => 'Выберите сервер',
                'list' => [
                    [
                        'title' => 'Онлайнер',
                        'value' => 'onliner',
                        'additional_class' => 'mini--option',
                        'attr' => ['data-id' => '188'],
                        ],
                    [
                        'title' => 'Тутбай',
                        'value' => 'tut',
                        'selected' => true,
                    ]
                ]
            ],
            [
                'type' => 'textarea',
                'name' => 'about',
                'title' => 'Немного о себе',
                'default' => 'Несколько строк',
            ],
            [
                'type' => 'radio',
                'name' => 'gender',
                'title' => 'Жен',
                'additional_class' => 'form-check-input',
            ],
            [
                'type' => 'radio',
                'name' => 'gender',
                'title' => 'Муж',
                'additional_class' => 'form-check-input',
            ],
            [
                'type' => 'select',
                'name' => 'server2',
                'additional_class' => 'js-login',
                'attr' => ['data-id' => '19'],
                'title' => 'Выберите страну',
                'multiple' => 'true',
                'list' => [
                    [
                        'title' => 'Беларусь',
                        'value' => 'rb',
                        'additional_class' => 'mini--option',
                        'attr' => ['data-id' => '189'],
                        'selected' => true,
                    ],
                    [
                        'title' => 'США',
                        'value' => 'usa',
                        'additional_class' => 'mini--option',
                    ],
                    [
                        'title' => 'Россия',
                        'value' => 'russia',
                        'additional_class' => 'mini--option',
                    ]
                ]
            ],
        ]
    ]
);

$valid = new Validator('maxLength', 5);
echo '<br>maxLength: ' .  $valid->exec(3);

$valid = new Validator('regexp', '#^([\w]+\.?)+(?<!\.)@(?!\.)[a-zа-я0-9ё\.-]+\.?[a-zа-яё]{2,}$#ui');
echo '<br>regexp for email: ' . $valid->exec('sdfdsf@mail.ru');

$valid = new Validator('email');
echo '<br>email: ' . $valid->exec('aaaaaa@mail.ru');

$valid = new Validator('in', [2, 4, 6]);
echo '<br>in: ' . $valid->exec(4);

$valid = new Validator('number');
echo '<br>number: ' . $valid->exec(44);

$valid = new Validator(
    'chain',
    true,
    [
        new Validator('minLength', 5),
        new Validator('regexp', '#^[a-z@\.]+$#'),
        new Validator('email'),
        new Validator('maxLength', 14),
    ]
);
echo '<br>complex condition: ' . $valid->exec('sfdfds@mail.ru');

$app->footer();
