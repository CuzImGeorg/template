<?php
require_once 'entity.php';

class Personen {
    use ActiveRecordable, Findable,Deletable,Persistable;
    protected static $table = 'personen';

    private int $id;
    private string $email, $password;
    private $telefonnr;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
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

    /**
     * @return mixed
     */
    public function getTelefonnr()
    {
        return $this->telefonnr;
    }

    /**
     * @param mixed $telefonnr
     */
    public function setTelefonnr($telefonnr): void
    {
        $this->telefonnr = $telefonnr;
    }

    public function getArtikel() :array|false
    {
        return Artikel::findeArtikelByPersonid($this->id);
    }
}



?>