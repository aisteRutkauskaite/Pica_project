<?php

namespace App\Controllers\Auth;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
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
            unset($clean_inputs['password_repeat']);
            App::$db->insertRow('users', $clean_inputs + ['role' => 'user']);
            header('Location: /login');
        }
        $this->page->setContent($this->form->render());
        return $this->page->render();
    }
}


