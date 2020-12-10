<?php


namespace App\Views\Forms\Admin;


use Core\Views\Form;

class AddForm extends Form
{
    public function __construct() {
        parent::__construct([
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'ITEM',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter item\'s name',
                            'class' => 'input-field',
                        ],
                    ],
                ],
                'price' => [
                    'label' => 'PRICE',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_numeric',
                        'validate_field_range' => [
                            'min' => 1,
                            'max' => 9999,
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter item\'s price',
                            'class' => 'input-field',
                        ],
                    ],
                ],
                'image' => [
                    'label' => 'IMAGE URL',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_url',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter item\'s image URL',
                            'class' => 'input-field',
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'send' => [
                    'title' => 'ADD',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn',
                        ],
                    ],
                ],
            ],
        ]);
    }
}