<?php


namespace App\Views\Tables\Admin;


use App\App;
use Core\Views\Table;

class UsersTable  extends Table
{
    public function __construct()
    {
        $rows = App::$db->getRowsWhere('users');

        parent::__construct([
            'headers' => [
                'ID',
                'User name',
                'Role',
            ],
            'rows' => $rows
        ]);
    }
}