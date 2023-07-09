<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\FunctionModel;

class FunctionController extends BaseController
{
    private $function_model;
    public function __construct()
    {
        $this->function_model = new FunctionModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('function','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_functions'));
            return $this->page_construct('dashboard/function_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function function_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->function_model->getFunctions($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_function()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('function','add')))
        {
            $data_function = $this->request->getPost();
            $data['result'] = ($this->function_model->add_function($data_function));
            $data['message']= $this->function_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_function()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('function','edit')))
        {
            $data_function = $this->request->getPost();
            $data['result'] = ($this->function_model->edit_function($data_function));
            $data['message']= $this->function_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_function()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('function','delete')))
        {
            $data_function = $this->request->getPost();
            $data['result'] = ($this->function_model->delete_function($data_function));
            $data['message']= $this->function_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}