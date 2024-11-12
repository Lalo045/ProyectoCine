<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Usuario extends Controller {
   
   public function index() {
       return view('head') .
              view('usuario/login') .
              view('footer');
   }

   public function acceder() {
       $user = $this->request->getPost('user');
       $pass = $this->request->getPost('pass');

       $usuarioM = model('UsuarioM');
       $session = session();

       $result = $usuarioM->valida($user, $pass);

       if (count($result) > 0) {
           $newdata = [
               'user'      => $result[0]->user,
               'tipo'      => $result[0]->tipo,
               'logged_in' => TRUE,
           ];
           
           $session->set($newdata);
  
           return redirect()->to(base_url('/peliculas'));
           
   
       } else {
           $session->destroy();
           return redirect()->to(base_url('/usuario'));
       }
   }

   public function salir() {
       $session = session();
       $session->remove(['user', 'tipo', 'logged_in']);
   
       return redirect()->to(base_url('/usuario'));
   }
}
