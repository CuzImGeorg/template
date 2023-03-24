<?php 
require_once 'entity.php';
require_once 'dbconn.php';

class Adresse {
    use ActiveRecordable, Findable,Deletable,Persistable;
    private int $id = 0, $plz, $hausnr, $personid;
    private string $straße, $ort;
    protected static $table = 'adresse';
    
    public function getId() : int
    {
        return $this->id;
    }
    public function getPlz() : int
    {
        return $this->plz;
    }
    public function getHausNr() : int
    {
        return $this->hausnr;
    }
    public function getPersonid() : int
    {
        return $this->personid;
    }
    public function getStraße():string
    {
        return $this->straße;
    }
    public function getOrt():string
    {
        return $this->ort;
    }
    public function setId(int $id):void
    {
        $this->id = $id;
    }
    public function setPlz(int $plz):void
    {
        $this->plz = $plz;
    }
    public function setHausNr(int $hausNr):void
    {
        $this->hausnr = $hausNr;
    }
    public function setPersonid(int $personid):void
    {
        $this->personid = $personid;
    }
 
    public function setStraße($straße):void
    {
        $this->straße = $straße;
    }

    public function setOrt($ort):void
    {
        $this->ort = $ort;
    }

    public static function findByPersonID($personid) : array|bool
    {
        $sql = "SELECT * FROM adresse WHERE personid = " . $personid;
        $a = DB::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'adresse');
        $erg = $a->fetchAll();
        return $erg;
    }

    public function getPerson():Person {
        return Person::finde($this->personid);
    }




}


?>