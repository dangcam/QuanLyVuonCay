<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\GroupModel;

class GroupController extends BaseController
{
    private $group_model;
    public function __construct()
    {
        $this->group_model = new GroupModel();
    }

    public function index()
    {
        if($this->libauth->checkFunction('group','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_groups'));
            $data['list_group'] = $this->group_model->getGroupParent();
            return $this->page_construct('dashboard/group_view', $meta, $data);
        }else
            return view('errors/html/error_403');
    }
    public function group_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->group_model->getGroups($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_group()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('group','add')))
        {
            $data_group = $this->request->getPost();
            $data['result'] = ($this->group_model->add_group($data_group));
            $data['message']= $this->group_model->get_messages();
            echo json_encode(array_values($data));
        }else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_group()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('group','edit')))
        {
            $data_group = $this->request->getPost();
            $data['result'] = ($this->group_model->edit_group($data_group));
            $data['message']= $this->group_model->get_messages();
            echo json_encode(array_values($data));
        }else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function delete_group()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('group','delete')))
        {
            $data_group = $this->request->getPost();
            $data['result'] = ($this->group_model->delete_group($data_group));
            $data['message']= $this->group_model->get_messages();
            echo json_encode(array_values($data));
        }else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function tree_group()
    {
        $data = $this->group_model->getTreeGroupParent('vpddt');

        echo json_encode(array_values($data),JSON_UNESCAPED_UNICODE);

    }
}