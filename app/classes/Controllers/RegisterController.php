<?php


namespace App\Controllers;


use App\App;
use App\Controllers\Base\AuthController;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Forms\LoginForm;
use App\Views\Forms\RegisterForms;

class RegisterController extends GuestController
{
    protected  RegisterForms $form;
    protected BasePage $page;
    public function __construct()
    {
        parent::__construct();
        $this->form = new RegisterForms();
        $this->page = new BasePage([
            'title' => 'Register'
        ]);
    }
    public function register()
    {
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            App::$db->insertRow('users', $clean_inputs);
            header('Location: /login');
        }
        $this->page->setContent($this->form->render());
        return $this->page->render();
    }
}



