<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('cookie');
        $cookie = get_cookie('id_admin');
        if(isset($cookie)){
            $sesi = [
                'id_admin'         => $cookie,
                'is_login_admin'   => TRUE
            ];
            session()->set($sesi);
        }
        if (!session()->get('is_login_admin'))
        {
            return redirect()->to('admin/login');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}