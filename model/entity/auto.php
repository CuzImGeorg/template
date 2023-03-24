<?php

class Auto {
    use ActiveRecordable, Findable,Deletable,Persistable;
    private int $id;
    private string $targa, $hersteller, $model;
    protected static $table = 'auto';

   public function getPersonen() {
        return Person::getPersonenByAuto($this->id);
    }

    public static function getByPersonid($id) {
        $sql = "SELECT auto.* FROM auto JOIN autoperson a on auto.id = a.autoid WHERE personid = ?";
        #$sql = "SELECT * FROM auto WHERE id = ANY (SELECT autoid FROM autoperson WHERE personid = ?)";
        $c = DB::getDB()->prepare($sql);
        $c->setFetchMode(PDO::FETCH_CLASS, 'auto');
        $c->execute(array($id));
        return $c->fetchAll();
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTarga(): string
    {
        return $this->targa;
    }

    /**
     * @param string $targa
     */
    public function setTarga(string $targa): void
    {
        $this->targa = $targa;
    }

    /**
     * @return string
     */
    public function getHersteller(): string
    {
        return $this->hersteller;
    }

    /**
     * @param string $hersteller
     */
    public function setHersteller(string $hersteller): void
    {
        $this->hersteller = $hersteller;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }




}


?>