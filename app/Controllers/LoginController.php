<?php
namespace App\Controllers;
use App\Models\UserModel;

class LoginController extends BaseController
{
    private $user_model;

    public function __construct()
    {
        $this->user_model = new UserModel();
    }
    public function index()
    {
        if($this->libauth->check()){
            return redirect()->to('dashboard');
        }
        return view('login_view');
    }
    public function login_ajax()
    {
        if($this->request->getPost())
        {
            $data_user = $this->request->getPost();
            $data['result'] = ($this->user_model->login($data_user));
            $data['message']= $this->user_model->get_messages();
            echo json_encode(array_values($data));
        }
    }
}