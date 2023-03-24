<?php

class Message
{
    use ActiveRecordable, Findable,Deletable,Persistable;

    protected static $table = "message";
    private int $id = 0;
    private int$benutzerid;
    private string $msgtext;
    private  $time;

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
     * @return int
     */
    public function getBenutzerid(): int
    {
        return $this->benutzerid;
    }

    /**
     * @param int $benutzerid
     */
    public function setBenutzerid(int $benutzerid): void
    {
        $this->benutzerid = $benutzerid;
    }

    /**
     * @return string
     */
    public function getMsgtext(): string
    {
        return $this->msgtext;
    }

    /**
     * @param string $msgtext
     */
    public function setMsgtext(string $msgtext): void
    {
        $this->msgtext = $msgtext;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }

    public static function getLast20() : array | false{
        $sql = "SELECT * FROM message ORDER BY id DESC LIMIT 20";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'message');
        return $a->fetchAll();
    }

    public function getBenutzer() {
        return Benutzer::finde($this->benutzerid);
    }



}