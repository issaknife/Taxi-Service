<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class Login extends Form
{
    public function __construct(array $data = [])
    {
        $data = [
            'attr' => [
                'method' => 'POST'
            ],
            'title' => 'Login',
            'fields' => [
                'email' => [
                    'type' => 'email',
                    'label' => 'Email',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_is_email'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'john@gmail.com',
                        ]
                    ]
                ],
                'password' => [
                    'type' => 'password',
                    'label' => 'Password',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Password'
                        ]
                    ],
                ]
            ],
            'validators' => [
                'validate_login'
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Log in'
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail'
            ]
        ];

        parent::__construct($data);
    }
}
