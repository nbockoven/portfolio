<?

class Home extends CI_Controller{

  public function index(){
    // page info
    $page['title']   = "Home";
    $page['heading'] = "An Awesome Store";
    $page['heading_small'] = 'come and get it';

    // views
    $page['main_content'] = $this->load->view('index/listing.tpl', null, true);
    $this->load->view('page.tpl', $page);
  }

  public function not_found(){
    die('no way, Jose');
  }

}

?>
