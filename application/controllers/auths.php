<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auths extends CI_Controller
{

  public function __construct()
  {
    parent:: __construct();
    $this->load->model('login_model');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('security');
    $this->load->helper('url');
  }

  public function index()
  {

    $logged = $this->login_model->isLogged();
    if($logged == TRUE)
    {
     $this->load->view('panel/panel');;
   }
   else
   {
     $this->registro();
   }
 }

 public function registro() {

  if(!isset($_POST['username']))
  {
    $this->load->view('panel/inicio_login'); 
  }
  else
  {

    $this->form_validation->set_rules('username','Username','required|min_lenght[3]|max_lenght[20]');
    $this->form_validation->set_rules('password','Password','required|min_lenght[3]|max_lenght[20]');


    if($this->form_validation->run() == FALSE) 
    {
      $this->load->view('panel/inicio_login');
    }
    else
    {

      $u = $this->input->post('username');
      $p = $this->input->post('password');
      $damon = $this->config->item('le_lats');
      $hmsd = md5(sha1($damon.$p));
      $isValidLogin['query'] = $this->login_model->getLogin($u, $hmsd); 
      if($isValidLogin['query'])
      {

        $consulta = "SELECT * FROM users WHERE user = '$u' AND password = '$hmsd';";
        $respuesta = mysql_query($consulta);
        while($row = mysql_fetch_array($respuesta))
        {
          $name = $row['name'];
          $rol = $row['rol'];
        }

        $sesion_data = array(
          'username' => $_POST['username'],
          'name' => $name,
          'rol' => $rol
          );

        $this->session->set_userdata($sesion_data);



        
        redirect('panel');
        


        

      }
      else
      {
        $sMsjError = 'The <strong>Username</strong> and <strong>Password</strong> do not match';
        $datos['sMsjError'] = $sMsjError;
        $datos['usuario'] = $u;
        $datos['intentos'] = 1;
        $this->load->view('panel/inicio_login', $datos);
      }
    }


  }

}

public function cerrar_sesion()  {  
  $this->login_model->close();
  $this->load->view('panel/inicio_login');
}

}
?>
