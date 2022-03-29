<?php

use Phalcon\Mvc\Controller;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;

use Phalcon\Escaper;

class SignupController extends Controller
{

    public function IndexAction()
    {
    }

    public function registerAction()
    {
        $user = new Users();

        $myescaper = new \App\Components\myescaper();
        echo $myescaper->getCurrentDate();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

         $data = $myescaper->sanitize($name ,$email);
        // print_r($data);
      //   echo
       //  echo "die() fucntoin called";
      //  die();


        $user->name = $data['username'];
        $user->email = $data['email'];

        $success = $user->save();
        $this->view->success = $success;

        if ($success) {
            $this->view->message = "Register succesfully";
        } else {
            $this->view->message = "Not Register succesfully due to following reason: <br>" . implode("<br>", $user->getMessages());
            $this->view->message = $message;
            $adapter = new Stream('../app/logs/signup.log');
            $logger  = new Logger(
                'messages',
                [
                    'signup' => $adapter,
                ]
            );
            $logger->alert("failed to login");
        }
    }

    public function testAction()
    {
        echo "hello";
    }
}
