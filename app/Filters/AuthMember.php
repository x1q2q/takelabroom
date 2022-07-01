<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthMember implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('cookie');
        $cookie = get_cookie('id_user');
        if(isset($cookie)){
            $sesi = [
                'id_user'           => $cookie,
                'is_login_member'   => TRUE
            ];
            session()->set($sesi);
        }
        if (!session()->get('is_login_member'))
        {
            return redirect()->to('member/login');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}