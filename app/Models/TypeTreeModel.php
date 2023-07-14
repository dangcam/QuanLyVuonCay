<?php
namespace App\Models;

use App\Entities\TypeTreeEntity;

class TypeTreeModel extends BaseModel
{
    protected $table      = 'type_tree';
    protected $primaryKey = 'tree_id';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = TypeTreeEntity::class;
    protected $validationRules = [
        'tree_id'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[type_tree.tree_id]',
        'tree_name'     => 'required|max_length[50]'
    ];
    //
    public function add_tree($data)
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
            $this->set_message("TypeTreeLang.tree_creation_successful");
            return 0;
        }else
        {
            $this->set_message("TypeTreeLang.tree_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_tree($data)
    {
        $tree_id = $data['tree_id'];
        unset($data['edit']);
        unset($data['tree_id']);
        $result = $this->update($tree_id,$data);
        if($result)
        {
            $this->set_message("TypeTreeLang.tree_update_successful");
            return 0;
        }else
        {
            $this->set_message("TypeTreeLang.tree_update_unsuccessful");
            return 3;
        }
    }
    public function delete_tree($data)
    {
        $tree_id = $data['tree_id'];

        if($this->where('tree_id',$tree_id)->delete())
        {
            $this->set_message("TypeTreeLang.tree_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TypeTreeLang.tree_delete_unsuccessful");
            return 3;
        }
    }
    public function get_type_tree($postData=null){
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
        $this->like('tree_name',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "tree_id"=>$record->tree_id,
                "tree_name"=>$record->tree_name,
                "note"=>$record->note,

                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-tree_id="'.$record->tree_id.'" data-tree_name ="'.$record->tree_name.'"                          
                            data-note ="'.$record->note.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-tree_id="'.$record->tree_id.'">
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