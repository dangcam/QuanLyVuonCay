<?php

namespace App\Controllers;

use App\Models\UserFunctionModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\lib_auth;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class HomeController extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
     protected $session;

    /**
     * Constructor.
     */
    public $libauth;
    public $language;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        // Preload any models, libraries, etc, here.
        $this->libauth = new lib_auth();
        $this->language = \Config\Services::language();
        $this->session = \Config\Services::session();
        $this->language->setLocale('vi');
    }
    public function page_construct($page,$meta = array(),$data = array())
    {
        return view('layout/header',$meta).
            view('layout/silebar',$this->silebar_view()).
            view($page,$data).
            view('layout/footer');
    }

    public function silebar_view()
    {
        $response = '';
        if($this->libauth->checkFunction('treepart','view')) {
            $response .= '<li><a href="' . base_url() . 'dashboard/treepart"><i class="icon icon-form"></i><span class="nav-text">' . lang('AppLang.treepart') . '</span></a></li>';
            $response .= '<li><a href="' . base_url() . 'dashboard/treepart/report"><i class="icon icon-book-open-2"></i></i><span class="nav-text">' . lang('AppLang.report') . '</span></a></li>';
        }

        $response .= '<li class="nav-label">'.lang('category').'</li>
                    <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                        class="icon icon-tablet-mobile"></i><span class="nav-text">'.lang('AppLang.category').'</span></a>
                        <ul aria-expanded="false">';
        if($this->libauth->checkFunction('type_tree','view'))
            $response .= '<li><a href="'.base_url().'dashboard/type_tree">'.lang('AppLang.type_of_tree').'</a></li>';
        if($this->libauth->checkFunction('garden','view'))
            $response .= '<li><a href="'.base_url().'dashboard/garden">'.lang('AppLang.garden').'</a></li>';
        if($this->libauth->checkFunction('treeline','view'))
            $response .= '<li><a href="'.base_url().'dashboard/treeline">'.lang('AppLang.treeline').'</a></li>';
        if($this->libauth->checkFunction('worker','view'))
            $response .= '<li><a href="'.base_url().'dashboard/worker">'.lang('AppLang.worker').'</a></li>';


        $response .= '  </ul>
                      </li>';
        $response .= '<li class="nav-label">'.lang('management').'</li>
            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                        class="icon icon-settings-gear-64"></i><span class="nav-text">'.lang('AppLang.system').'</span></a>
                <ul aria-expanded="false">';
        if($this->libauth->checkFunction('function','view'))
            $response .= '<li><a href="'.base_url().'dashboard/function">'.lang('AppLang.function_manager').'</a></li>';
        if($this->libauth->checkFunction('group','view'))
            $response .= '<li><a href="'.base_url().'dashboard/group">'.lang('AppLang.group_manager').'</a></li>';
        $response .='
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                        class="icon icon icon-single-04"></i><span class="nav-text">'.lang('AppLang.users').'</span></a>
                <ul aria-expanded="false">';
        if($this->libauth->checkFunction('user','view'))
            $response .= '<li><a href="'.base_url().'dashboard/user">'.lang('AppLang.user_manager').'</a></li>';
        $response .='            
                </ul>
            </li>
            ';
        $data['silebar_menu'] = $response;
        return $data;
    }
}
