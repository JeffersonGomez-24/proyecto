<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    private UserModel $model;
    
    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function index()
    {
        helper("admin");

        $users = $this->model->paginate(3);

        return view("Admin\Views\Users\index",[
            "users" => $users,
            "pager" => $this->model->pager 
        
        ]);
        
    }
    public function show($id)
    {
        $users = $this->getUserOr404($id);

        return view("Admin\Views\Users\show", [
            "user" => $user
        ]);
    }

    public function toggleBand($id)
    {
        $user = $this->getUserOr404($id);

        if ($user->isBanned()){
            $user->unBan();
        
        } else {
            $user->ban();
        }
       
        return redirect()->back()
                        ->with("message","User sabed");


    }

    private function getUserOr404($id): User
    {
        $users = $this->model->find($id);

        if ($users === null){

            throw new PageNotFoundException("User with id $id not found");

        }

        return $users;
    }
}
