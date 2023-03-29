<?php
class ReservationModel {
    // Properties, fields
    private $db;
    public $helper;

    public function __construct() {
      $this->db = new Database();
    }



    public function getAantalpunten()
    {
                                              $this->db->query('SELECT 
                                              Persoon.Voornaam,
                                              Persoon.Tussenvoegsel,  
                                              Persoon.Achternaam,
                                              Reservering.Datum,
                                              Spel.PersoonId,
                                              Uitslag.Aantalpunten
                                  FROM Persoon 
                                  INNER JOIN Reservering ON Persoon.Id = Reservering.PersoonId
                                  INNER JOIN Spel ON Persoon.Id = Spel.PersoonId
                                  INNER JOIN Uitslag ON Spel.Id = Uitslag.SpelId
                                  WHERE Reservering.PersoonId = 2');
                                  return $this->db->resultSet();
}




}