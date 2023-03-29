<?php
class mederwerkerpuntenModel {
  // Properties, fields
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function getAantalpunten() {
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
    INNER JOIN Uitslag ON Spel.Id = Uitslag.SpelId');
    return $this->db->resultSet();
  }

  public function getAantalpuntenById() {
    $this->db->query('SELECT 
      Persoon.Voornaam,
      Persoon.Tussenvoegsel,  
      Persoon.Achternaam,
      Spel.PersoonId,
      Uitslag.Aantalpunten,
      
    FROM Persoon 
    INNER JOIN Spel ON Persoon.Id = Spel.PersoonId
    INNER JOIN Uitslag ON Spel.Id = Uitslag.SpelId
    WHERE Uitslag.Id = :Id');
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->single();
  }

  public function updatePunten($data) {
    $this->db->query('UPDATE Uitslag SET Aantalpunten = :aantalpunten, Datum = :datum WHERE Id = :id');
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':aantalpunten', $data['aantalpunten']);
    $this->db->bind(':datum', $data['datum']);
    return $this->db->execute();
  }

  public function updatePointsById($id, $aantalpunten, $datum) {
    $this->db->query('UPDATE Uitslag SET Aantalpunten = :aantalpunten, Datum = :datum WHERE Id = :id');
    $this->db->bind(':id', $id);
    $this->db->bind(':aantalpunten', $aantalpunten);
    $this->db->bind(':datum', $datum);
    return $this->db->execute();
  }
}