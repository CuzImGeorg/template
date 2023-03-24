<?php

trait Entity {
   
    
   /** 
    *  Generischer Konstruktor
    * @param array $daten
    * 
    * 
    */ 
   public function __construct($daten = array()) {
        if ($daten) {
            foreach ($daten as $k => $v) {
                $setterName = 'set' . ucfirst($k); 
                if (method_exists($this, $setterName)) {
                    $this->$setterName($v);
                }
            }
        }
    } 
    

    /**
     * Wandelt alle Eigenschaften der Klasse in ein assoziatives Array um
     * 
     * @param int $mitId
     * @return array
     * 
     * 
     */
    public function toArray($mitId = true) : array{
        $attribute = get_object_vars($this);
        if ($mitId === false) {
            // wenn $mitId false ist, entferne den Schlüssel id aus dem Ergebnis
            unset($attribute['id']);
        }
        return $attribute;
    }
    
   
    public function speichere() {
        if ($this->getId() > 0) {
            // wenn die ID eine Datenbank-ID ist, also größer 0, führe ein UPDATE durch
            $this->_update();
        } else {
            // ansonsten einen INSERT
            $this->_insert();
        }
    }
    
    
    
    
}
