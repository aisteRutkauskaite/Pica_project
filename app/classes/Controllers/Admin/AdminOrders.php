<?php


namespace App\Controllers\Admin;


use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Tables\Admin\ProductsTable;
use Core\Views\Form;

class AdminOrders extends AuthController
{

    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->page = new BasePage([
            'title' => 'Orders'
        ]);
    }

    public function orderList()
    {

        $table = new ProductsTable();
        $this->page->setContent($table->render());
        return $this->page->render();
    }
}