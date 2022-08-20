<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\SubscribeModel;

class SiteController extends Controller
{
    public function home(Request $request)
    {
        $subscribeModel = new SubscribeModel();


        if ($request->isPost()) {

            $subscribeModel->loadData($request->getBody());

            if ($subscribeModel->validate() && $subscribeModel->setEmails()) {

                // echo '<pre>';
                // var_dump($subscribeModel);
                // echo '</pre>';
                // exit;
                return 'Success!';
            }


            // echo '<pre>';
            // var_dump($subscribeModel->errors);
            // echo '</pre>';
            // exit;

            return $this->render('home', [
                'model' => $subscribeModel
            ]);
        }

        return $this->render('home', [
            'model' => $subscribeModel
        ]);
    }

    // public function handleSubscription(Request $request)
    // {
    //     $data = $request->getBody();
    //     echo $data['email'];

    //     return $this->render('homeSubscribed');
    // }

    // public function contact()
    // {
    //     return $this->render('contact');
    // }

    // public function handleContent(Request $request)
    // {
    //     $data = $request->getBody();



    //     return 'Handaling Data Controllers';
    // }
}
