<?php
namespace App\Models;

use App\Entities\GardenEntity;

class GardenModel extends BaseModel
{
    protected $table      = 'garden';
    protected $primaryKey = 'garden_id,garden_year';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = GardenEntity::class;
    protected $validationRules = [
        'garden_id'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[garden.garden_id]',
        'garden_name'     => 'required|max_length[50]',
    ];
    //
    public function add_garden($data)
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
            $this->set_message("GardenLang.garden_creation_successful");
            return 0;
        }else
        {
            $this->set_message("GardenLang.garden_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_garden($data)
    {
        $garden_id = $data['garden_id'];
        unset($data['edit']);
        unset($data['garden_id']);
        $result = $this->update($garden_id,$data);
        if($result)
        {
            $this->set_message("GardenLang.garden_update_successful");
            return 0;
        }else
        {
            $this->set_message("GardenLang.garden_update_unsuccessful");
            return 3;
        }
    }
    public function delete_garden($data)
    {
        $garden_id = $data['garden_id'];

        if($this->where('garden_id',$garden_id)->delete())
        {
            $this->set_message("GardenLang.garden_delete_successful");
            return 0;
        }else
        {
            $this->set_message("GardenLang.garden_delete_unsuccessful");
            return 3;
        }
    }
    public function list_type_tree()
    {
        $tb = $this->db->table('type_tree');
        return $tb->get()->getResult();
    }
    public function get_garden($postData=null){
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $strInput=$postData['search']['value'];

        // Custom search filter
        $searchYear = $postData['searchYear'];

        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount')->where('garden_year',$searchYear);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('garden_name',$strInput)->where('garden_year',$searchYear);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "garden_id"=>$record->garden_id,
                "garden_name"=>$record->garden_name,
                "acreage"=>$record->acreage,
                "year_planting"=>$record->year_planting,
                "year_down"=>$record->year_down,
                "year_up"=>$record->year_up,
                "year_full"=>$record->year_full,
                "type_tree"=>$record->type_tree,
                "type_garden"=>$record->type_garden,
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-garden_id="'.$record->garden_id.'" data-garden_name ="'.$record->garden_name.'"                          
                            data-garden_year ="'.$record->garden_year.'" data-acreage ="'.$record->acreage.'"
                            data-year_planting ="'.$record->year_planting.'" data-year_down ="'.$record->year_down.'"
                            data-year_up ="'.$record->year_up.'" data-year_full ="'.$record->year_full.'"
                            data-type_tree ="'.$record->type_tree.'" data-type_garden ="'.$record->type_garden.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-garden_id="'.$record->garden_id.'">
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