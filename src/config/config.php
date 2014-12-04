<?php

return array(
    //mysite.com/route_prefix
    'route_prefix' => '',

    //aктивные виджеты (для изменения порядка вывода, измените порядок в массиве)
    //
    //
    //visitors24 - Число посетителей за последние 24 часа
    //allUsers - Общее количество посетителей
    //sessDur - Среднее время проведенное на сайте
    //pageDepth - Cреднее количество страниц за сеанс
    //typeTraffic - Виды входящего трафика
    //topReferral - Топ источники трафика/переходов
    'widgets' => array(
        'visitors24' => array(
            'type' => 'short',
            'use_ga' => true
        ),
        'allUsers' => array(
            'type' => 'full',
            'use_ga' => true
        ),
        'sessDur' => array(
            'type' => 'full',
            'use_ga' => true
        ),
        'pageViews' => array(
            'type' => 'full',
            'use_ga' => true
        ),
        'typeTraffic' => array(
            'type' => 'full',
            'use_ga' => true
        ),
        'topReferral' => array(
            'type' => 'full',
            'use_ga' => true
        ),
    ),

    //Возможность указать начальную дату для слайдера
    //в формате YYYY-MM-DD
    //
    //Если дата не указана, берется 1 число текущего месяца
    'start_date' => '',

    //Возможность указать конечную дату для слайдера
    //в формате YYYY-MM-DD
    //
    //Если дата не указана, берется вчерашний день
    'end_date' => ''
);