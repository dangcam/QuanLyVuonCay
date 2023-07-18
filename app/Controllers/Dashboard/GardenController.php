<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\GardenModel;
use App\Models\TypeTreeModel;

class GardenController extends BaseController
{
    private $garden_model;
    public function __construct()
    {
        $this->garden_model = new GardenModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('garden','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_garden'));
            $data['list_type_tree'] = $this->garden_model->list_type_tree();
            return $this->page_construct('dashboard/garden_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function garden_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->garden_model->get_garden($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_garden()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('garden','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->garden_model->add_garden($data_post));
            $data['message']= $this->garden_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_garden()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('garden','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->garden_model->edit_tree($data_post));
            $data['message']= $this->garden_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_garden()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('garden','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->garden_model->delete_tree($data_post));
            $data['message']= $this->garden_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}