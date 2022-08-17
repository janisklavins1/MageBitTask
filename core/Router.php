<?php
namespace app\core;

class Router 
{
    protected array $routes = [];
    public Request $request;

    public function __construct(\app\core\Request $request) 
    {
        $this->request = $request;
        
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        //  Page Not Found
        if ($callback === false) {
            echo "Not Found";
            exit;
        }

        echo call_user_func($callback);

        // echo '<pre>';
        // var_dump($callback);
        // echo '</pre>';
        // exit;
    }
}