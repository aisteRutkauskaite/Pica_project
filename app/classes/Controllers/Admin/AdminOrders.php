<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\OrderStatusForm;
use App\Views\Tables\Admin\ProductsTable;

class AdminOrders extends AuthController
{
    protected BasePage $page;
    protected OrderStatusForm $form;

    public function __construct()
    {
        parent::__construct();
        $this->page = new BasePage([
            'title' => 'Orders'
        ]);
        $this->form = new OrderStatusForm();
    }

    public function orderList()
    {
        $rows = App::$db->getRowsWhere('orders');

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();

            foreach ($rows as $id => $row) {
                if ($clean_inputs['row_id'] == $id) {
                    $row['status'] = $clean_inputs['status'];
                    App::$db->updateRow('orders', $id, $row);
                }
            }
        }

        $table = new ProductsTable();
        $this->page->setContent($table->render());
        return $this->page->render();
    }
}