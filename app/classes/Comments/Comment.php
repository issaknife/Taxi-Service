<?php

namespace App\Comments;

use Core\DataHolder;

class Comment extends DataHolder
{

    protected function setId(int $id)
    {
        $this->id = $id;
    }

    protected function getId()
    {
        return $this->id ?? null;
    }

    protected function setText($text)
    {
        $this->text = $text;
    }

    protected function getText()
    {
        return $this->text ?? null;
    }

    protected function setDate($date)
    {
        $this->date = $date;
    }

    protected function getDate()
    {
        return $this->date ?? null;
    }

    protected function setUid($uid)
    {
        $this->uid = $uid;
    }

    protected function getUid()
    {
        return $this->uid ?? null;
    }

    protected function setName($name)
    {
        $this->name = $name;
    }

    protected function getName()
    {
        return $this->name ?? null;
    }
}
