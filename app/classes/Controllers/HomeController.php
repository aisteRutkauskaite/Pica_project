<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\DeleteForm;
use App\Views\Forms\LoginForm;
use App\Views\Navigation;
use Core\View;
use App\Views\Content\HomeContent;
use Core\Views\Form;

class HomeController extends Controller
{
    protected  $page;
    protected  $form;
    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * For example, create $page object,
     * set it's header/navigation
     * or check if user has a proper role
     *
     * Goal is to prepare $page
     */
    public function __construct()
    {
        $this->form = new LoginForm();
        $this->page = new BasePage([
            'title' => 'Pizzas'
        ]);
    }

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new PixelsController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ProductsController();
     * print $controller->my();
     *
     * @return string|null
     */
    function index(): ?string
    {

        if (App::$session->getUser()) {
            $h3 = "Sveiki sugrize {$_SESSION['email']}";
        } else {
            $h3 = 'Jus neprisijunges';
        }

        if (isset($_POST['id'])) {
            $rows = App::$db->getRowsWhere('pizzas');
            foreach ($rows ?? [] as $key => $pizza) {
                if ($key == $_POST['id']) {
                    App::$db->updateRow('pizzas', $key, $pizza);
                }
            }
        }

        $content = new View([
            'tittle' => 'Welcome to our pizzaria',
            'heading' => $h3,
            'products' => App::$db->getRowsWhere('pizzas'),
        ]);

        $this->page->setContent($content->render(ROOT . '/app/templates/content/index.tpl.php'));

        return $this->page->render();
    }
}

