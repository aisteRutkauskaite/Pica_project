<?php


namespace App\Views\Tables\Admin;


use App\App;
use App\Views\Forms\Admin\DeleteForm;
use Core\Views\Link;
use Core\Views\Table;

class ProductsTable extends Table
{
    public function __construct()
    {
        $rows = App::$db->getRowsWhere('orders');

        parent::__construct([
            'headers' => [
                'ID',
                'User name',
                'Pizza name',
                'Time Ago',
                'Status'
            ],
            'rows' => $rows
        ]);
    }
}