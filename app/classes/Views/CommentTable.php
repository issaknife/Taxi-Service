<?php

namespace App\Views;

use App\Comments\Model as CommentsModel;
use App\Users\Model;
use Core\Views\Table;

class CommentTable extends Table
{
    public function __construct($data = [])
    {
        $data = $this->handle_table_data();
        parent::__construct($data);
    }

    private function handle_table_data()
    {
        $comments = CommentsModel::getWhere([]);
        $table = [
            'attr' => [
                'class' => 'comment_table'
            ],
            'headings' => [
                'Name',
                'Comment',
                'Date'
            ]
        ];

        foreach ($comments as $comment) {
            $row = [];
            $sort = ['uid', 'text', 'date'];
            foreach ($sort as $property) {
                if ($property === 'uid') {
                    $user = Model::find($comment->$property);
                    $row[] = $user->name;
                } else {
                    $row[] = $comment->$property;
                }
            }
            $table['rows'][] = $row;
        }

        return $table;
    }
}
