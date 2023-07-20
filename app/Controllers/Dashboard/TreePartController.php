<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TreePartModel;

class TreePartController extends BaseController
{
    private $treepart_model;
    public function __construct()
    {
        $this->treepart_model = new TreePartModel();
    }

    public function index()
    {
        if($this->libauth->checkFunction('treepart','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_treepart'));
            $data['list_garden'] = $this->treepart_model->list_garden();
            $data['list_worker'] = $this->treepart_model->list_worker();
            return $this->page_construct('dashboard/treepart_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function treepart_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->treepart_model->get_treepart($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_treepart()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('treepart','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->treepart_model->add_treepart($data_post));
            $data['message']= $this->treepart_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_treepart()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('treepart','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->treepart_model->edit_treepart($data_post));
            $data['message']= $this->treepart_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_treepart()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('treepart','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->treepart_model->delete_treepart($data_post));
            $data['message']= $this->treepart_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}