<?

class Heroes_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function getHeroes( $id = null ){
    $id = intval($id);

    $data = [
      1 => [
        'name'   => 'Superman',
        'power'  => 'flight',
        'gender' => 'm'
      ],
      2 => [
        'name' => 'Batman',
        'power' => 'martial arts',
        'gender' => 'm'
      ],
      3 => [
        'name' => 'Wonder Woman',
        'power' => 'strength',
        'gender' => 'f'
      ]
    ];

    if( $id ){
      $data = $data[$id];
    }

    return $data;
  }

}

?>
