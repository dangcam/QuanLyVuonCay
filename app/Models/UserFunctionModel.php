<?php
namespace App\Models;
use App\Entities\UserFunctionEntity;

class UserFunctionModel Extends BaseModel
{
    protected $table = 'user_function';
    protected $primaryKey = 'user_id';// có 2 khoá chính
    protected $protectFields = false;
    protected $returnType = UserFunctionEntity::class;

    public function getListUserFunction($user_id)
    {
        if(!isset($user_id))
            $user_id = $this->session->get('user_id');
        $sql = 'SELECT * FROM (SELECT * FROM user_function WHERE user_id = ?) AS UF RIGHT JOIN functions ON functions.function_id = UF.function_id';

        $result = $this->db->query($sql,[$user_id])->getResult();
        $i=0;
        $response = '';
        foreach ($result as $key) {
            $i++;
            $response .= '<tr >';
            $response .= '<th>'.$i.'</th>';
            $response .= '<td>'.lang('AppLang.'.$key->function_name).'
                                 <input type="hidden" value="'.$user_id.'" name="data['.$i.'][user_id]">
                                 <input type="hidden" value="'.$key->function_id.'" name="data['.$i.'][function_id]">
                          </td>';
            $response .= '<td ><input class="form-check-input" type="checkbox" name="data['.$i.'][function_view]" '.($key->function_view==1?'checked':'').' value="1"></td>';
            $response .= '<td ><input class="form-check-input" type="checkbox" name="data['.$i.'][function_add]" '.($key->function_add==1?'checked':'').' value="1"></td>';
            $response .= '<td><input class="form-check-input" type="checkbox" name="data['.$i.'][function_edit]" '.($key->function_edit==1?'checked':'').' value="1"></td>';
            $response .= '<td ><input class="form-check-input" type="checkbox" name="data['.$i.'][function_delete]" '.($key->function_delete==1?'checked':'').' value="1"></td>';
            $response .= '</tr>';

        }
        return $response;
    }
    public function update_uf($data_uf)
    {
        foreach ($data_uf as $item)
        {
            $update['user_id'] = $item['user_id'];
            $update['function_id'] = $item['function_id'];
            $update['function_view'] = isset($item['function_view'])?$item['function_view']:0;
            $update['function_add'] = isset($item['function_add'])?$item['function_add']:0;
            $update['function_edit'] = isset($item['function_edit'])?$item['function_edit']:0;
            $update['function_delete'] = isset($item['function_delete'])?$item['function_delete']:0;
            $this->where('user_id',$update['user_id'])->where('function_id',$update['function_id']);
            if($this->find())
            {
                //$user_id = $update['user_id'];
                //$function_id = $update['function_id'];
                //unset($update['user_id']);
                //unset($update['function_id']);
                if(!$this->replace($update))
                {
                    $this->set_message("UserLang.user_function_unsuccessful");
                    return 3;
                }
            }else
            {
                if($this->insert($update))
                {
                    $this->set_message("UserLang.user_function_unsuccessful");
                    return 3;
                }
            }
        }
        $this->set_message("UserLang.user_function_successful");
        return 0;
    }
    public function getFuntionUser($user_id = false)
    {
        if (!$user_id) {
            $user_id = $this->session->get('user_id');
        }
        $listFunction = $this->where('user_id',$user_id)->find();
        if($listFunction) {
            $data = array();
            foreach ($listFunction as $value) {
                $data[$value->function_id]['view'] = $value->function_view;
                $data[$value->function_id]['add'] = $value->function_add;
                $data[$value->function_id]['edit'] = $value->function_edit;
                $data[$value->function_id]['delete'] = $value->function_delete;
            }
            return $data;
        }
        return $listFunction;
    }


}