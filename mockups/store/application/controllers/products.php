<?

class Products extends CI_Controller{

  public function __construct(){
    parent::__construct();
    // models
    $this->load->model('Heroes_model');
  }

  public function _remap( $id, $params = null ){
    if( intval($id) ){
      $this->detail( $id );
    }
    else{
      if( method_exists($this, $id) ){
        $this->$id( $params );
      }
      else{
        show_404();
      }
    }
  }

  public function index(){
    // page info
    $page['title']   = "Products listing";
    $page['heading'] = "An Awesome Store";
    $page['heading_small'] = 'come and get it';

    // views
    $page['main_content'] = $this->load->view('products/listing.tpl', null, true);
    $this->load->view('page.tpl', $page);
  }

  public function detail( $id ){
    // page info
    $page['title'] = "Products detail";
    $page['heading'] = "An Awesome Store";
    $page['heading_small'] = 'come and get it';
    // views
    $page['main_content'] = $this->load->view('products/detail.tpl', null, true);
    $this->load->view('page.tpl', $page);
  }

}

?>
