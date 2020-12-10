<?php


namespace App\Controllers\Admin;


use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Tables\Admin\ProductsTable;
use App\Views\Tables\Admin\UsersTable;

class AdminUsers extends AuthController
{
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->page = new BasePage([
            'title' => 'Users'
        ]);
    }

    public function userList()
    {

        $table = new UsersTable();
        $this->page->setContent($table->render());
        return $this->page->render();
    }

}