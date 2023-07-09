<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\lib_auth;

class AuthFilters implements FilterInterface
{
    public function __construct()
    {
        $this->libauth = new lib_auth();
    }

    public function before(RequestInterface $request, $arguments = null)
    {

        if(!$this->libauth->check())
        {
            return redirect()->to(site_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}