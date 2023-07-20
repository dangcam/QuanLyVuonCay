<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\WorkerModel;

class WorkerController extends BaseController
{
    private $worker_model;
    public function __construct()
    {
        $this->worker_model = new WorkerModel();

    }
    public function index()
    {
        if($this->libauth->checkFunction('worker','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_worker'));
            return $this->page_construct('dashboard/worker_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function worker_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->worker_model->get_worker($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_worker()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('worker','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->worker_model->add_worker($data_post));
            $data['message']= $this->worker_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_worker()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('worker','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->worker_model->edit_worker($data_post));
            $data['message']= $this->worker_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_worker()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('worker','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->worker_model->delete_worker($data_post));
            $data['message']= $this->worker_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}