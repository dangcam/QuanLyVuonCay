<?php


namespace App\Models;


use App\Entities\GroupEntity;

class GroupModel extends BaseModel
{
    protected $table      = 'groups';
    protected $primaryKey = 'group_id';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = GroupEntity::class;
    protected $validationRules = [
        'group_id'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[groups.group_id]',
        'group_name'     => 'required|max_length[50]'
    ];
    /*
    protected $validationMessages = [
        'group_id' => [
            'is_unique' => 'Mã chi nhánh {value} đã tồn tại, vui lòng kiểm tra lại.',
            'min_length' =>'Mã chi nhánh quá ngắn (ít nhất {param} ký tự).',
            'max_length'=>'Mã chi nhánh quá dài (nhiều nhất {param} ký tự).'
        ],
        'group_name' =>[
            'max_length' =>'Tên chi nhánh quá dài (nhiều nhất {param} ký tự).'
        ]
    ];*/
    function getGroups($postData=null){
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $strInput=$postData['search']['value'];

        // lọc nhóm chi nhánh theo user
        $listGroup = $this->getGroupParent();
        $listGroupParent = array();
        if(count($listGroup)){
            foreach ($listGroup as $key => $item) {
                $listGroupParent[] = $item->group_id;
            }
        }
        $search_arr = array();
        $array_parent ="";
        if(count($listGroupParent)>0){
            $array_parent = implode("','",$listGroupParent);
            $search_arr[] = " group_id in ('". $array_parent ."') ";
        }
        //
        if($array_parent!='')
            $this->where(" group_id in ('". $array_parent ."')");
        ## Total number of records without filtering
        $this->select('count(*) as allcount');//->whereIn('group_id',$data_group_parent);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        if($array_parent!='')
            $this->where(" group_id in ('". $array_parent ."')");
        $this->like('group_name',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "group_id"=>$record->group_id,
                "group_name"=>$record->group_name,
                "group_parent"=>$record->group_parent,
                "group_status"=>$record->group_status==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=>$this->add_active_source($record)
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
						 	data-group_id="'.$record->group_id.'" href="#" data-group_name="'.$record->group_name.'"
							data-group_parent="'.$record->group_parent.'" data-group_status="'.$record->group_status.'">
							<i class="fa fa-pencil color-muted"></i>
								<span class="align-middle">'.lang('AppLang.edit').'</span>
						</a>
					  	<a class="dropdown-item text-danger" data-toggle="modal" data-target="#smallModal" data-group_id="'.$record->group_id.'" href="#">
							<i class="fa fa-close color-danger"></i>
								<span class="align-middle">'.lang('AppLang.delete').'</span>
						</a>
					</div>
				</div>';
        return $string;
    }
    public function getTreeGroupParent()
    {
        $listGroup = $this->getGroupParent();
        if (count($listGroup)) {
            foreach ($listGroup as $key => $item) {
                $sub_data["id"] = $item->group_id;
                $sub_data["name"] = $item->group_name;
                $sub_data["text"] = $item->group_name;
                $sub_data["parent_id"] = $item->group_parent;
                $data[] = $sub_data;
            }
            foreach($data as $key => &$value)
            {
                $output[$value["id"]] = &$value;
            }
            foreach($data as $key => &$value)
            {
                if($value["parent_id"] && isset($output[$value["parent_id"]]))
                {
                    $output[$value["parent_id"]]["nodes"][] = &$value;
                }
            }
            foreach($data as $key => &$value)
            {
                if($value["parent_id"] && isset($output[$value["parent_id"]]))
                {
                    unset($data[$key]);
                }
            }
            return $data;
        }
        return $listGroup;
    }
    public function getGroupParent()
    {
        $group_id = $this->session->get('group_id');
        $listGroup = $this->where('group_id',$group_id)->find();
        if(count($listGroup)) {
            $data[] = $listGroup[0];
            $parent[] = $listGroup[0]->group_id;
            while (count($parent)) {
                $p = $parent[0];
                array_splice($parent, 0, 1);
                $list = $this->where('group_parent', $p)->find();
                if (count($list)) {
                    foreach ($list as $key => $value) {
                        $data[] = $value;
                        $parent[] = $value->group_id;
                    }
                }
            }
            return $data;
        }
        return $listGroup;
    }

    public function add_group($data)
    {
        unset($data['add']);
        $group = new GroupEntity($data);
        if(!$this->validate($data))
        {
            foreach ($this->errors() as $error) {
                $this->set_message($error);
            }
            return 3;
        }
        if(!$this->insert($group))
        {
            $this->set_message("GroupLang.group_creation_successful");
            return 0;
        }else
        {
            $this->set_message("GroupLang.group_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_group($data)
    {
        $group_id = $data['group_id'];
        unset($data['edit']);
        unset($data['group_id']);
        $result = $this->update($group_id,$data);
        if($result)
        {
            $this->set_message("GroupLang.group_update_successful");
            return 0;
        }else
        {
            $this->set_message("GroupLang.group_update_unsuccessful");
            return 3;
        }
    }
    public function delete_group($data)
    {
        $group_id = $data['group_id'];

        if($this->where('group_id',$group_id)->delete())
        {
            $this->set_message("GroupLang.group_delete_successful");
            return 0;
        }else
        {
            $this->set_message("GroupLang.group_delete_unsuccessful");
            return 3;
        }
    }
}