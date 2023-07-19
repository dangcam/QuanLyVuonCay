<?php
namespace App\Models;

use App\Entities\TreeLineEntity;

class TreeLineModel extends BaseModel
{
    protected $table      = 'treeline';
    protected $primaryKey = 'line_id,line_year';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = TreeLineEntity::class;
    protected $validationRules = [
        'line_id'      => 'required|alpha_dash|min_length[1]|max_length[10]',
    ];
    //
    public function add_treeline($data)
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
            $this->set_message("TreeLineLang.treeline_creation_successful");
            return 0;
        }else
        {
            $this->set_message("TreeLineLang.treeline_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_treeline($data)
    {
        unset($data['edit']);
        $result = $this->replace($data);
        if($result)
        {
            $this->set_message("TreeLineLang.treeline_update_successful");
            return 0;
        }else
        {
            $this->set_message("TreeLineLang.treeline_update_unsuccessful");
            return 3;
        }
    }
    public function delete_treeline($data)
    {
        $line_id = $data['line_id'];
        $line_year = $data['line_year'];
        $garden_id = $data['garden_id'];

        if($this->where('line_id',$line_id)
            ->where('line_year',$line_year)
            ->where('garden_id',$garden_id)
            ->delete())
        {
            $this->set_message("TreeLineLang.treeline_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TreeLineLang.treeline_delete_unsuccessful");
            return 3;
        }
    }
    public function list_garden()
    {
        $tb = $this->db->table('garden');
        return $tb->get()->getResult();
    }
    public function get_treeline($postData=null){
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
        $searchGarden = $postData['searchGarden'];

        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount')->where('line_year',$searchYear)->where('garden_id',$searchGarden);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('line_id',$strInput)->where('line_year',$searchYear)->where('garden_id',$searchGarden);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "line_id"=>$record->line_id,
                "tree_live"=>$record->tree_live,
                "tree_dead"=>$record->tree_dead,
                "hole_empty"=>$record->hole_empty,
              
                "active"=> ' <span>
                            <a href="#" class="mr-2 update" data-toggle="modal"  line_id="'.$record->line_id.'" hole_empty ="'.$record->hole_empty.'"
                            tree_live ="'.$record->tree_live.'" tree_dead ="'.$record->tree_dead.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>                               
                           
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-line_id="'.$record->line_id.'">
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