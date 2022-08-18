<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Janis Klavins"
        ];

        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContent(Request $request)
    {
        $data = $request->getBody();

        // echo '<pre>';
        //ar_dump($data['email']);
        echo $data['email'];
        // echo '</pre>';
        // exit;

        return 'Handaling Data Controllers';
    }
}
