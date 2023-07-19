<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TreeLineModel;

class TreeLineController extends BaseController
{
    private $treeline_model;
    public function __construct()
    {
        $this->treeline_model = new TreeLineModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('treeline','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_treeline'));
            $data['list_garden'] = $this->treeline_model->list_garden();
            return $this->page_construct('dashboard/treeline_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function treeline_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->treeline_model->get_treeline($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_treeline()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('treeline','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->treeline_model->add_treeline($data_post));
            $data['message']= $this->treeline_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_treeline()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('treeline','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->treeline_model->edit_treeline($data_post));
            $data['message']= $this->treeline_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_treeline()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('treeline','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->treeline_model->delete_treeline($data_post));
            $data['message']= $this->treeline_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}