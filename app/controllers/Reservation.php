

<?php
class Reservation extends Controller {

  private $ReservationModel;

  public function __construct()
  {
     $this->ReservationModel = $this->model('ReservationModel');
  }

  public function index() {
    /**
     * Haal alle instructeurs op uit de model
     */
    $Aantalpunten = $this->ReservationModel->getAantalpunten();

   /**
 * Maak tabelrijen van de opgehaalde data over de instructeurs
 */
$rows = '';
foreach ($Aantalpunten as $value)
{
  $rows .= "<tr>
              <td>$value->Voornaam</td>
              <td>$value->Tussenvoegsel</td>
              <td>$value->Achternaam</td>
              <td>$value->Aantalpunten</td>
              <td>$value->Datum</td>

            </tr>";
}
    
    /**
     * Stuur de informatie door naar de view
     */
    $data = [
      'title' => 'Instructeurs in dienst',
      'amountOfInstructeurs' => sizeof($Aantalpunten),
      'rows' => $rows
    ];
    $this->view('/Reservation/index', $data);
  }

  public function update($id = null) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $this->countryModel->updatePunten($_POST);
      header("Location:" . URLROOT . "/Reservation/index");
    } else {
      $row = $this->countryModel->getSingleCountry($id);
      $data = [
        'title' => '<h1>Update landenoverzicht</h1>',
        'row' => $row
      ];
      $this->view("Reservation/update", $data);
    }
  }


  


    }


    