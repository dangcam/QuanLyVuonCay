<?php
namespace App\Models;

use App\Entities\WorkerEntity;

class WorkerModel extends BaseModel
{
    protected $table      = 'worker';
    protected $primaryKey = 'worker_id';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = WorkerEntity::class;
    protected $validationRules = [
        'worker_id'      => 'required|alpha_dash|min_length[5]|max_length[20]|is_unique[worker.worker_id]',
        'worker_name'     => 'required|max_length[50]'
    ];
    //
    public function add_worker($data)
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
            $this->set_message("WorkerLang.worker_creation_successful");
            return 0;
        }else
        {
            $this->set_message("WorkerLang.worker_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_worker($data)
    {
        $worker_id = $data['worker_id'];
        unset($data['edit']);
        unset($data['worker_id']);
        $result = $this->update($worker_id,$data);
        if($result)
        {
            $this->set_message("WorkerLang.worker_update_successful");
            return 0;
        }else
        {
            $this->set_message("WorkerLang.worker_update_unsuccessful");
            return 3;
        }
    }
    public function delete_worker($data)
    {
        $worker_id = $data['worker_id'];

        if($this->where('worker_id',$worker_id)->delete())
        {
            $this->set_message("WorkerLang.worker_delete_successful");
            return 0;
        }else
        {
            $this->set_message("WorkerLang.worker_delete_unsuccessful");
            return 3;
        }
    }
   
    public function get_worker($postData=null){
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $strInput=$postData['search']['value'];

        // Custom search filter

        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount');
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('worker_name',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "worker_id"=>$record->worker_id,
                "worker_name"=>$record->worker_name,
                "worker_birthyear"=>$record->worker_birthyear,
                "worker_year"=>$record->worker_year,
                "phone_number"=>$record->phone_number,
                "address"=>$record->address,
              
                "active"=> ' <span>
                            <a href="#" class="mr-2 update" data-toggle="modal"  worker_id="'.$record->worker_id.'" 
							worker_year ="'.$record->worker_year.'"
                            worker_name ="'.$record->worker_name.'" worker_birthyear ="'.$record->worker_birthyear.'"
							phone_number ="'.$record->phone_number.'" address ="'.$record->address.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>                               
                           
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-worker_id="'.$record->worker_id.'">
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
}