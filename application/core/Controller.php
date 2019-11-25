<?phpnamespace application\core;use application\config\Config;abstract class Controller{    public $route;    public $view;    public $model;    public $acl;    public function __construct($route)    {        $this->acl = require 'application/acl/' . ucfirst($route['controller']) . 'ACL.php';        $this->route = $route;        if (!$this->check_acl())        {            View::error_code(403);        }        $this->view = new View($route);        $this->model = $this->load_model($route['controller']);    }    private function load_model($model_name)    {        $path = '\\application\\models\\' . ucfirst($model_name) . 'Model';        if (class_exists($path))        {            return new $path;        }        return null;    }    private function check_acl()    {        if ($this->is_acl('all'))        {            return true;        }        if (!isset($_SESSION['account']) and $this->is_acl('guest'))        {            return true;        }        if (isset($_SESSION['account']) and $_SESSION['account']['role_id'] == Config::ADMIN_ID and $this->is_acl('admin'))        {            return true;        }        if (isset($_SESSION['account']) and $_SESSION['account']['role_id'] == Config::MODERATOR_ID and $this->is_acl('moderator'))        {            return true;        }        if (isset($_SESSION['account']) and $_SESSION['account']['role_id'] == Config::USER_ID and $this->is_acl('moderator'))        {            return true;        }        return false;    }    private function is_acl($key)    {        return in_array($this->route['action'], $this->acl[$key]);    }}