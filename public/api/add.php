<?php

use App\App;
use App\Comments\Comment;
use App\Comments\Model;
use App\Users\Model as UsersModel;
use App\Views\Forms\Comments\CommentForm;

require_once '../../bootloader.php';

if (!App::$session->getUser()) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$form = new CommentForm($_POST);
$form->validate();

function form_success($form, $input)
{
    $comment = new Comment([
        'text' => $input['text'],
        'date' => date('Y-m-d'),
        'uid' => App::$session->getUser()->id,
    ]);

    Model::insert($comment);

    $comment->name = (UsersModel::find($comment->uid))->name;
    print(json_encode($comment));
}

function form_fail(&$form, $input)
{
    print(json_encode($form));
}