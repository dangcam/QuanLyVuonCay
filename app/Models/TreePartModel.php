<?php
namespace App\Models;

use App\Entities\TreePartEntity;

class TreePartModel extends BaseModel
{
    protected $table      = 'treepart';
    protected $primaryKey = 'garden_id,line_id,line_year,worker_id';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = TreePartEntity::class;
    protected $validationRules = [
        'line_id'      => 'required|alpha_dash|min_length[1]|max_length[20]',
        'garden_id'      => 'required|alpha_dash|min_length[1]|max_length[20]',
        'line_year'      => 'required|alpha_dash|min_length[1]|max_length[20]',
        'worker_id'      => 'required|alpha_dash|min_length[1]|max_length[20]',
    ];
    //
    public function add_treepart($data)
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
            $this->set_message("TreePartLang.treepart_creation_successful");
            return 0;
        }else
        {
            $this->set_message("TreePartLang.treepart_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_treepart($data)
    {
        unset($data['edit']);
        $result = $this->replace($data);
        if($result)
        {
            $this->set_message("TreePartLang.treepart_update_successful");
            return 0;
        }else
        {
            $this->set_message("TreePartLang.treepart_update_unsuccessful");
            return 3;
        }
    }
    public function delete_treepart($data)
    {
        $line_id = $data['line_id'];
        $line_year = $data['line_year'];
        $garden_id = $data['garden_id'];
        $worker_id = $data['worker_id'];
        if($this->where('line_id',$line_id)
            ->where('line_year',$line_year)
            ->where('garden_id',$garden_id)
            ->where('worker_id',$worker_id)
            ->delete())
        {
            $this->set_message("TreePartLang.treepart_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TreePartLang.treepart_delete_unsuccessful");
            return 3;
        }
    }
    public function list_garden()
    {
        $tb = $this->db->table('garden');
        return $tb->get()->getResult();
    }
    public function list_treeline($line_year)
    {
        $tb = $this->db->table('treeline')->where('line_year',$line_year);
        return $tb->get()->getResult();
    }
	public function list_worker()
    {
        $tb = $this->db->table('worker');
        return $tb->get()->getResult();
    }
    public function get_treepart($postData=null){
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
        $searchWorker = $postData['searchWorker'];

        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount')->where('line_year',$searchYear)
			->where('worker_id',$searchWorker);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('line_id',$strInput)->where('line_year',$searchYear)
			->where('worker_id',$searchWorker);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $list_treeline_row = $this->list_treeline($searchYear);
        $treeline_row = array();
        foreach($list_treeline_row as $record ){
            $treeline_row[$record->garden_id . '.' . +$record->line_id][0] = $record->tree_live;
            $treeline_row[$record->garden_id . '.' . +$record->line_id][1] = $record->tree_dead;
            $treeline_row[$record->garden_id . '.' . +$record->line_id][2] = $record->hole_empty;
        }

        $data = array();
        foreach($records as $record ){
            $data[] = array(
                "garden_id"=>$record->garden_id,
                "line_id"=>$record->line_id,
                "tree_live"=>$treeline_row[$record->garden_id . '.' . +$record->line_id][0],
                "tree_dead"=>$treeline_row[$record->garden_id . '.' . +$record->line_id][1],
                "hole_empty"=>$treeline_row[$record->garden_id . '.' . +$record->line_id][2],

                "active"=> ' <span>                                                                                   
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-line_id="'.$record->line_id.'">
                                <i class="fa fa-close color-danger"></i></a>
                            </span>'
            );
        }
        //
        $sql = 'SELECT * FROM treeline WHERE (line_year = ? AND garden_id = ?) 
                    AND (line_id NOT IN (SELECT line_id FROM treepart 
                                        WHERE (line_year = ? AND garden_id = ?)))';
        $result = $this->db->query($sql, [$searchYear,$searchGarden,
                                            $searchYear,$searchGarden])->getResult();
        $list_treeline = array();
        foreach ($result as $item) {
            $list_treeline[] = array(
                "line_id" => $item->line_id
            );
        }
        //
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data,
            "list_treeline" => $list_treeline
        );

        return $response;
    }
}