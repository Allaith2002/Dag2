

<?php
class Mederwerkerpunten extends Controller {

  private $mederwerkerpuntenModel;

  public function __construct()
  {
     $this->mederwerkerpuntenModel = $this->model('mederwerkerpuntenModel');
  }

  public function index() {
    /**
     * Haal alle instructeurs op uit de model
     */
    $Aantalpunten = $this->mederwerkerpuntenModel->getAantalpunten();

   /**
 * Maak tabelrijen van de opgehaalde data over de instructeurs
 */
$rows = '';
foreach ($Aantalpunten as $value)
{
  $id = isset($value->ID) ? $value->ID : '';
  $rows .= "<tr>
              <td>$value->Voornaam</td>
              <td>$value->Tussenvoegsel</td>
              <td>$value->Achternaam</td>
              <td>$value->Aantalpunten</td>
              <td>$value->Datum</td>
              <td><a href='". URLROOT . "mederwerkerpunten/Update/$id'>update</a></td>
              </tr>";
}
    
    /**
     * Stuur de informatie door naar de view
     */
    $data = [
      'title' => 'Overzicht sperles',
      'amountOfInstructeurs' => sizeof($Aantalpunten),
      'rows' => $rows
    ];
    $this->view('/mederwerkerpunten/index', $data);
  }



  public function update() {
     //var_dump($id);exit();
     //var_dump($row);exit();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $this->mederwerkerpuntenModel->updatePunten($_POST);
      header("Location:" . URLROOT . "/mederwerkerpunten/index");
    } else {
      $row = $this->mederwerkerpuntenModel->getAantalpuntenById();
 $data = [
  'title' => '<h1>Update Mederwerkerpunt</h1>',
  'row' => $row 
];
      $this->view("mederwerkerpunten/update", $data);
    }
  }


  


    }


    