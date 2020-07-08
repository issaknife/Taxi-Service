<?php

namespace App\Comments;

use App\App;

class Model
{
    const TABLE = 'comments';

    public static function insert(Comment $product)
    {
        App::$db->createTable(self::TABLE);
        return App::$db->insertRow(self::TABLE, $product->_getData());
    }

    public static function getWhere($conditions)
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $products = [];

        foreach ($rows as $row) {
            $products[] = new Comment($row);
        }

        return $products;
    }

    public static function find($id)
    {
        $drink_data = App::$db->getRowById(self::TABLE, $id);

        if ($drink_data) {
            $drink = new Comment($drink_data);
            $drink->id = $id;

            return $drink;
        }

        return new Comment($drink_data);
    }
}
