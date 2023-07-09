<?php
namespace App\Libraries;


class lib_auth
{
    private $session;
    public $listFunctions;
    public function __construct()
    {
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->listFunctions = $this->getFuntionUser(session()->get('user_id'));
    }

    public function check()
    {
        if($this->session->get('user_id'))
            return true;
        if(get_cookie('user_id')){
            $this->session->set('user_id',get_cookie('user_id'));
            $this->session->set('group_id',get_cookie('group_id'));
            return true;
        }
        return false;
    }
    public function logout(){
        $this->session->destroy();
        delete_cookie('user_id');
        delete_cookie('group_id');
        return redirect()->to(base_url('/'))->withCookies();
    }
    public function getFuntionUser($user_id = false)
    {
        if (!$user_id) {
            $user_id = $this->session->get('user_id');
        }
        $listFunction = $this->db->table('user_function')->where('user_id',$user_id)->get()->getResult();
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
    public function checkFunction($function,$per){
        if(isset($this->listFunctions[$function]) && $this->listFunctions[$function][$per]==1)
            return true;
        return false;
    }
    public function getFunction($function)
    {
        if(isset($this->listFunctions[$function]))
            return $this->listFunctions[$function];
        return $function;
    }
    public function getError()
    {
        $data['result'] = 2;
        $data['message']= lang('AppLang.do_not_have_permission');
        return $data;
    }
}