<?phpnamespace application\core;class Router{    protected $routes = [];    protected $params = [];    public function __construct()    {        $this->load_routes();    }    private function load_routes()    {        $rts = require 'application/config/Routes.php';        foreach ($rts as $route => $params)        {            $this->add($route, $params);        }    }    private function add($route, $params)    {        $route_regex = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);        $route_regex = '#^' . $route_regex . '$#';        $this->routes[$route_regex] = $params;    }    private function match()    {        $current_url = trim($_SERVER['REQUEST_URI'], '/');        foreach ($this->routes as $route => $params)        {            if (preg_match($route, $current_url, $matches))            {                foreach ($matches as $key => $match)                {                    if (is_string($key))                    {                        if (is_numeric($match))                        {                            $match = (int)$match;                        }                        $params[$key] = $match;                    }                }                $this->params = $params;                return true;            }        }        return false;    }    public function run()    {        if ($this->match())        {            $controller_path = 'application\\controllers\\' . ucfirst($this->params['controller']) . 'Controller';            if (class_exists($controller_path))            {                $action = $this->params['action'] . "_action";                if (method_exists($controller_path, $action))                {                    $controller = new $controller_path($this->params);                    $controller->$action();                } else                {                    View::error_code(404);                }            } else            {                View::error_code(404);            }        } else        {            View::error_code(404);        }    }}