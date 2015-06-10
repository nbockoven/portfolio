<?

class Heroes extends CI_Controller{

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
    $page['title']   = "Heroes listing";
    $page['heading'] = "Here are some awesome heroes";
    $page['heading_small'] = 'the listing';
    $data['heroes']  = $this->Heroes_model->getHeroes();

    // views
    $page['main_content'] = $this->load->view('heroes/listing.tpl', $data, true);
    $this->load->view('page.tpl', $page);
  }

  public function detail( $id ){
    // page info
    $page['title'] = "Heroes detail";
    $page['heading'] = "Here is the hero detail page";
    $page['heading_small'] = 'the detail';
    $data['hero']    = $this->Heroes_model->getHeroes( $id );
    // views
    $page['main_content'] = $this->load->view('heroes/detail.tpl', $data, true);
    $this->load->view('page.tpl', $page);
  }





  public function nope(){
    echo "This is why I'm NOT hot.";
  }

  public function trythis( $params ){
    echo '<pre>';
    print_r($params);
    die();
  }

}

?>
