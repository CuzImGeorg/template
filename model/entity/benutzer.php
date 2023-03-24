<?php

class Benutzer {
    use ActiveRecordable, Findable,Deletable,Persistable;

    protected static $table = "benutzer";
    private int $id = 0;
    private string $vorname;
    private string $nachname ;
    private string $nickname;
    private string $password;

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
    public function getVorname(): string
    {
        return $this->vorname;
    }

    /**
     * @param string $vorname
     */
    public function setVorname(string $vorname): void
    {
        $this->vorname = $vorname;
    }

    /**
     * @return string
     */
    public function getNachname(): string
    {
        return $this->nachname;
    }

    /**
     * @param string $nachname
     */
    public function setNachname(string $nachname): void
    {
        $this->nachname = $nachname;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

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

    public static function getByNickNameAndPassword($un, $password) : Benutzer | false {
        $sql = "SELECT * FROM benutzer WHERE nickname = '$un' and password = '$password'";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'benutzer');
        return $a->fetch();
    }





}



?>