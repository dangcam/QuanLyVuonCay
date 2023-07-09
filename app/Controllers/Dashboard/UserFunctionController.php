<?php


namespace App\Controllers\Dashboard;


use App\Controllers\BaseController;
use App\Models\UserFunctionModel;

class UserFunctionController extends BaseController
{
    private $userfunction_model;

    public function __construct()
    {
        $this->userfunction_model = new UserFunctionModel();
    }

    public function index()
    {
        if ($this->request->getPost()) {
            $user_id = $this->request->getPost()['user_id'];
            echo $this->userfunction_model->getListUserFunction($user_id);
        }
    }
    public function update()
    {
        if($this->request->getPost())
        {
            $data_uf = $this->request->getPost()['data'];
            $data['result'] = ($this->userfunction_model->update_uf($data_uf));
            $data['message']= $this->userfunction_model->get_messages();
            echo json_encode(array_values($data));
        }
    }


}