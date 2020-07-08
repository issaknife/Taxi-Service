<?php

use App\Comments\Model;
use App\Users\Model as UsersModel;

require_once '../../bootloader.php';

$comments = Model::getWhere([]);

foreach ($comments ?? [] as $comment_key => &$comment) {
    $user = UsersModel::find($comment->uid);
    if ($user) {
        $comment->name = $user->name;
    }
}

print(json_encode($comments));
