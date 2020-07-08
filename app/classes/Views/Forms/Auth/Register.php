<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class Register extends Form
{
    public function __construct(array $data = [])
    {
        $data = [
            'attr' => [
                'method' => 'POST'
            ],
            'title' => 'Register',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Name',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_contains_only_letters',
                        'validate_field_length' => [
                            'min' => 1,
                            'max' => 40
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'John',
                        ]
                    ]
                ],
                'surname' => [
                    'type' => 'text',
                    'label' => 'Surname',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_contains_only_letters',
                        'validate_field_length' => [
                            'min' => 1,
                            'max' => 40
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Johnson',
                        ]
                    ]
                ],
                'email' => [
                    'type' => 'email',
                    'label' => 'Email',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_is_email'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'John@gmail.com',
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
                ],
                'password_repeat' => [
                    'type' => 'password',
                    'label' => 'Password repeat',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Password'
                        ]
                    ],
                ],
                'phone' => [
                    'type' => 'number',
                    'label' => 'Phone Number',
                    'extra' => [
                        'attr' => [
                            'placeholder' => '(212) 515 2525',
                        ]
                    ]
                ],
                'address' => [
                    'type' => 'text',
                    'label' => 'Home Address',
                    'extra' => [
                        'attr' => [
                            'placeholder' => '36 Downtown Ave',
                        ]
                    ]
                ],
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ],
                'validate_field_unique' => [
                    'field' => 'email'
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Register'
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
