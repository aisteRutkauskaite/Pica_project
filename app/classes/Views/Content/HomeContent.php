<?php


namespace App\Views\Content;


use App\App;
use App\Controllers\HomeController;
use App\Views\Forms\Admin\DeleteForm;
use Core\Views\Form;
use DateTime;

class HomeContent
{
    protected DeleteForm $form;

    public function __construct()
    {
        $this->form = new deleteForm();
    }

    public function content()
    {
        if (Form::action()) {
            if ($this->form->validate()) {
                $clean_inputs = $this->form->values();
                ​App::$db->deleteRow('pizzas', $clean_inputs['row_id']);
            }
        }

        if (isset($_POST['id'])) {

            if ($_POST['id'] === 'ORDER') {
                var_dump('wtf');
                $rows = App::$db->getRowsWhere('orders');
                $pizza_id = 1;

                foreach ($rows as $id => $row) {
                    $pizza_id++;
                }

                App::$db->insertRow('orders', [
                    'email' => $_SESSION['email'],
                    'id' => $pizza_id,
                    'status' => 'active',
                    'name' => $_POST['name'],
                    'timestamp' => time()
                ]);
            }
        }
    }
}