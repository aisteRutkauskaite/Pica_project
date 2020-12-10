<?php


namespace App\Controllers\Admin;


use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;

class EditController extends AuthController
{
    protected AddForm $form;
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new AddForm();
        $this->page = new BasePage([
            'title' => 'Edit'
        ]);
    }
    public function edit()
    {
        $row_id = $_GET['id'] ?? null;
        if ($row_id === null) {
            header("Location: /list");
            exit();
        }
        $this->form->fill(App::$db->getRowById('items', $row_id));
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            App::$db->updateRow('items', $row_id, $clean_inputs);
            $p = 'You edited the item';
            header('Location: /index.php');
            exit();
        }
        $this->page->setContent($this->form->render());
        return $this->page->render();
    }
}

