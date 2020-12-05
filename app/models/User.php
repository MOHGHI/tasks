<?php


namespace app\models;


class User extends AppModel
{
    public $attributes = [
        'login' => '',
        'password' => '',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
        ],
    ];
}