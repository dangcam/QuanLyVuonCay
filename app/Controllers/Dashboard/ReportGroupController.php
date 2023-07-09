<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\ReportGroupModel;
use App\Models\UserModel;

class ReportGroupController extends BaseController
{
    public function __construct()
    {
        $this->report_group_model = new ReportGroupModel();
    }

    public function index()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_report_group'));
        return $this->page_construct('dashboard/report_group_view',$meta);
    }
    public function report_print(){
        $data['list_group'] = $this->report_group_model->getGroupParent($this->session->get('group_id'));
        $meta = array('page_title'=>lang('AppLang.page_title_report_group'));
        return $this->page_construct('dashboard/report_print',$meta,$data);
    }
    public function data_report_group()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->report_group_model->getListReportGroup($data['report_month'],$data['report_year'],$data['group_id']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function data_report_group_print()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->report_group_model->getListReportGroupPrint($data);
            echo json_encode(array_values($return_value));
        }else {
            echo json_encode(array_values('No Data'));
        }
    }
    public function save_report_group()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('report_group','add')))
        {
            $data_report = $this->request->getPost();
            $data['result'] = ($this->report_group_model->save_report_group($data_report));
            $data['message']= $this->report_group_model->get_messages();
            echo json_encode(array_values($data));
        }else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
}