<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_home'));
        return $this->page_construct('dashboard/home_view',$meta);
    }
    public function logout()
    {
        $this->libauth->logout();
        return redirect('/');
    }
    public function lang()
    {
        $locale = $this->request->getLocale();
        $this->session->remove('lang');
        $this->session->set('lang', $locale);
        $url = base_url();
        return redirect()->to($url);
    }
}
