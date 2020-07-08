<?php

namespace App\Views\Forms\Comments;

use Core\Views\Form;

class CommentForm extends Form
{
    public function __construct(array $data = [])
    {
        $form = [
            'attr' => [
                'method' => 'POST',
                'class' => 'comment_form',
            ],
            'title' => 'Add Comment',
            'fields' => [
                'text' => [
                    'type' => 'textarea',
                    'label' => 'Your Comment',
                    'validators' => [
                        'validate_user_logged_in',
                        'validate_field_not_empty',
                        'validate_field_length' => [
                            'min' => 1,
                            'max' => 500
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your comment',
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Add Comment'
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail'
            ]
        ];
        parent::__construct($form);
    }
    
    public function setId(int $id)
    {
        $this->data['fields']['id']['value'] = $id;
    }
}
