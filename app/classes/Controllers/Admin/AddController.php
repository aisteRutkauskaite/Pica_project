<?php


namespace App\Controllers\Admin;


use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;
use App\Views\Forms\LoginForm;

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
//            $email  = $_SESSION['email'] ;
//            $items = App::$db->insertRow('items', $clean_inputs);
            App::$db->insertRow('items', $clean_inputs);
            $p = 'You added an item';
            header('Location: /index.php');
            exit();
        }
        $this->page->setContent($this->form->render());
        return $this->page->render();
    }
}






