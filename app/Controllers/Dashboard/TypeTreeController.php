<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TypeTreeModel;

class TypeTreeController extends BaseController
{
    private $tree_model;
    public function __construct()
    {
        $this->tree_model = new TypeTreeModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('type_tree','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_type_tree'));
            return $this->page_construct('dashboard/type_tree_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function tree_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->tree_model->get_type_tree($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_tree()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('type_tree','add')))
        {
            $data_tree = $this->request->getPost();
            $data['result'] = ($this->tree_model->add_tree($data_tree));
            $data['message']= $this->tree_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_tree()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('type_tree','edit')))
        {
            $data_tree = $this->request->getPost();
            $data['result'] = ($this->tree_model->edit_tree($data_tree));
            $data['message']= $this->tree_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_tree()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('type_tree','delete')))
        {
            $data_tree = $this->request->getPost();
            $data['result'] = ($this->tree_model->delete_tree($data_tree));
            $data['message']= $this->tree_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}