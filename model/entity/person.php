<?php 

require_once 'entity.php';
require_once 'dbconn.php';

class Person {
    use ActiveRecordable, Findable,Deletable,Persistable;


    private int $id = 0;
    private string $vorname;
    private string $nachname;
    private string $nick;

    private string $password;
    protected static $table = 'person';

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getNick(): string
    {
        return $this->nick;
    }

    /**
     * @param string $nick
     */
    public function setNick(string $nick): void
    {
        $this->nick = $nick;
    }


    


    /**
     * Get the value of vorname
     * @return string
     */ 
    public function getVorname():string
    {
        return $this->vorname;
    }

    /**
     * Set the value of vorname
     * @param string $name
     * @return  self
     */ 
    public function setVorname(string $vorname):Person
    {
        $this->vorname = $vorname;

        return $this;
    }

    /**
     * Set the value of nachname
     *
     * @return  self
     */ 
    public function setNachname(string $nachname):Person
    {
        $this->nachname = $nachname;

        return $this;
    }

    /**
     * Get the value of nachname
     * @return string
     */ 
    public function getNachname():string
    {
        return $this->nachname;
    }

    /**
     * Get the value of id
     * @return int id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     * @param  int id 
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public static function getByNameAndPassword($un, $password) : Person | false {
        $sql = "SELECT * FROM person WHERE nick like $un and password like $password";
        return Db::getDB()->query($sql)->fetch();

    }
    /**
     * Summary of getByName
     * @param string $name
     * @return array
     */
    public static function getByName($name):array{
        $sql = "SELECT * FROM person WHERE vorname like ?";
        $c = DB::getDB()->prepare($sql);
        $c->execute(array($name));
        $c->setFetchMode(PDO::FETCH_CLASS, 'Person');
        $erg = $c->fetchAll();
        return $erg;
    }

    /**
     * Summary of getByLastName
     * @param string $name
     */
    public static function getByLastName($name):array {
        $sql = "SELECT * FROM person WHERE nachname like :name";
        $c = DB::getDB()->prepare($sql);
        $c->execute(array("name" => $name));
        $c->setFetchMode(PDO::FETCH_CLASS, 'person');
        $erg = $c->fetchAll();
        return $erg;
    }

    public function getAddressen() {
        return Adresse::findByPersonID($this->id);
    }

    public static function getPersonenByAuto($id){
        $sql = "SELECT person.* FROM person JOIN autoperson ON person.id = autoperson.id WHERE autoid = ?";
        # $sql = "SELECT * FROM person WHERE id = ANY (SELECT personid FROM autoperson WHERE autoid = ?)";
        $c = DB::getDB()->prepare($sql);
        $c->setFetchMode(PDO::FETCH_CLASS, 'person');
        $c->execute(array($id));
        return $c->fetchAll();
    }

    public function addAuto($id) {
        $sql = "INSERT INTO autoperson(personid, autoid) VALUES ($this->id, $id)";
        DB::getDB()->query($sql);
    }

    public function removeAutoFromPerson($id) {
        $sql = "DELETE FROM autoperson WHERE personid = $this->id AND autoid = $id";
        DB::getDB()->query($sql);
    }

    public function getAutos() {
        return AUTO::getByPersonid($this->id);
    }
}

?>