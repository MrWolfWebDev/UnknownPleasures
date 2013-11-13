<?php

class News {

    public function fromArray($array) {
        if (array_key_exists("ID", $array)) {
            $this->ID = $array["ID"];
        } else {
            $this->ID = -1;
        }
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
    }

    public function toArray() {

        $array = get_object_vars($this);
        /*
          $array = [
          "ID" => $this->IdNews,
          "Data" => $this->Data,
          "Titolo" => $this->Titolo,
          "Testo" => $this->Testo,
          "Foto" => $this->Foto,
          "DataIns" => $this->DataIns,
          ];
         */

        return $array;
    }

    public function __toString() {
        $array = $this->toArray();
        $string = implode(',', $array);

        return $string;
    }

}

?>