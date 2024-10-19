<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if (session('magicLogin')){

            return redirect()->to('set-password')
                             ->with('message', 'Please update your password');
                             
        }

        //$this->sendTestEmail();
        return view("Home/index");
    }

    private function sendTestEmail()
    {
        $email = \Config\Services::email();
        
        $email->setTo("recipient@miumg.edu.gt");

        $email->setSubject("Test Email");
        $email->setMessage("Hello from <i>CodeIgniter</i>");

        if ($email->send()) {

            echo "Email sent";

        } else{

            echo "Email not sent";
            
        }
    }
}
