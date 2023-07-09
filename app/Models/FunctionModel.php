<?php
namespace App\Models;

use App\Entities\FunctionEntity;

class FunctionModel extends BaseModel
{
    protected $table      = 'functions';
    protected $primaryKey = 'function_id';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = FunctionEntity::class;
    protected $validationRules = [
        'function_id'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[functions.function_id]',
        'function_name'     => 'required|max_length[50]|alpha_dash'
    ];
    //
    public function add_function($data)
    {
        unset($data['add']);
        if(!$this->validate($data))
        {
            foreach ($this->errors() as $error) {
                $this->set_message($error);
            }
            return 3;
        }
        if(!$this->insert($data))
        {
            $this->set_message("FunctionLang.function_creation_successful");
            return 0;
        }else
        {
            $this->set_message("FunctionLang.function_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_function($data)
    {
        $function_id = $data['function_id'];
        unset($data['edit']);
        unset($data['function_id']);
        $result = $this->update($function_id,$data);
        if($result)
        {
            $this->set_message("FunctionLang.function_update_successful");
            return 0;
        }else
        {
            $this->set_message("FunctionLang.function_update_unsuccessful");
            return 3;
        }
    }
    public function delete_function($data)
    {
        $function_id = $data['function_id'];

        if($this->where('function_id',$function_id)->delete())
        {
            $this->set_message("FunctionLang.function_delete_successful");
            return 0;
        }else
        {
            $this->set_message("FunctionLang.function_delete_unsuccessful");
            return 3;
        }
    }
    public function getFunctions($postData=null){
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $strInput=$postData['search']['value'];

        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount');
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('function_name',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "function_id"=>$record->function_id,
                "function_name"=>lang('AppLang.'.$record->function_name),
                "function_status"=>$record->function_status==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-function_id="'.$record->function_id.'" data-function_name ="'.$record->function_name.'"                          
                            data-function_status ="'.$record->function_status.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-function_id="'.$record->function_id.'">
                                <i class="fa fa-close color-danger"></i></a>
                            </span>'
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
        );

        return $response;
    }
    public function add_active_source($record)
    {
        $string ='<div class="dropdown show">
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                           <i class="fa fa-bars"></i>
                    </button>
					<div class="dropdown-menu">
						<a class="dropdown-item" data-toggle="modal" data-target="#myModal" data-whatever="edit"
						 	data-function_id="'.$record->function_id.'" href="#" data-function_name="'.$record->function_name.'" data-function_status="'.$record->function_status.'">
							<i class="fa fa-pencil color-muted"></i>
								<span class="align-middle">'.lang('AppLang.edit').'</span>
						</a>
					  	<a class="dropdown-item text-danger" data-toggle="modal" data-target="#smallModal" data-function_id="'.$record->function_id.'" href="#">
							<i class="fa fa-close color-danger"></i>
								<span class="align-middle">'.lang('AppLang.delete').'</span>
						</a>
					</div>
				</div>';
        return $string;
    }
}