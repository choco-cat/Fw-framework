<?php

use Fw\Core\Application;

include './fw/init.php';

$app = Application::getInstance();
$app->header();

?>

<pre>
    ---------17.09.2022---------
    1. Включение элементов формы в форму в шаблоне
    2. Создан абстрактный класс FormElement для построения инпута формы и инициализации
    значений по умолчанию параметров инпута
    3. Создан класс для элемента select
    4. Создан класс для элемента radio
    5. Создан класс для элемента textarea

    ---------15.09.2022---------
    1. Подключение bootstrap к сайту
    2. Верстка хедера, футера
    3. Создана структура компонента interface.form
    4. Создан компонент interface.input для построения элементов input формы

    ---------12.09.2022---------
    1. Подключение компонента news.list в Application
    2. Подключение шаблона компонента
    3. Вызов макросов addCss, addJs из шаблона компонента

    ---------09.09.2022---------
    1. Создан класс Dictionary для наследования классами Request, Server
    2. Созданы конструкторы классов Request, Server
    3. Созданы классы Base, Template
    3. Создан компонент news.detail

    ---------08.09.2022---------
    1. Улучшена логика проверки уникальности массива скриптов, css-файлов

    ---------07.09.2022---------
    1. Изменен порядок ведения логов - новые выше.
    2. Исправления в классе Page - убрали ненужную статичность свойств класса, добавлены переносы строки.
    для вывода кода в head.
    4. Исправления в классе Application - убрали ненужную статичность свойств класса.
    5. Исправления в классе Template - путь к шаблону вынесен в переменную класса, добавлены методы для вывода
    футера и хедера.

    ---------06.09.2022---------
    1. Создан класс Page для управления контентом страницы.
    2. Улучшен класс Page - описаны методы setProperty, getProperty, showProperty.
    3. Добавлен метод для добавления тега addTag.

    ---------05.09.2022---------
    1. Создан трейт Single, переписаны классы Singleton на классы с использованием трейта.
    2. В init.php Добавлена глобальная константа IN_FW для проверки подключения ядра.
    3. Создана структура шаблона сайта, написан класс Template.
    4. Класс Application доработан - передаем шаблон для вывода хедера и футера.
    5. На главной странице ведется история изменений проекта.
    6. Использована буферизация для вывода контента.
</pre>

<?php

$app->includeComponent(
        'news.list',
        'default',
        [
            'sort'    => 'id',
            'limit' => 10,
            'show_title' => 'N',
        ]
);

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
                'default' => 'Введите логин'],
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

$app->footer();

?>
