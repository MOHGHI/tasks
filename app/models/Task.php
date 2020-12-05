<?php


namespace app\models;


class Task extends AppModel
{
    public $attributes = [
        'title' => '',
        'body' => '',
        'user_name' => '',
        'email' => '',
        'status' => '',
        'alias' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['body'],
            ['user_name'],
            ['email'],
        ],
        'email' => [
            ['email'],
        ],
    ];

}