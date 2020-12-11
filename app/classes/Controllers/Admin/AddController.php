<?php
namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;

class AddController extends AuthController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new AddForm();
        $this->page = new BasePage([
            'title' => 'ADD'
        ]);
    }

    public function add()
    {
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();

            App::$db->insertRow('pizzas', $clean_inputs);
            header('Location: /index.php');
            exit();
        }
        $this->page->setContent($this->form->render());
        return $this->page->render();
    }
}






