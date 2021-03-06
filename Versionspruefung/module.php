<?php
// Klassendefinition
class Fensterkontakte extends IPSModule {

    // Überschreibt die interne IPS_Create($id) Funktion
    public  function Create() {
        // Diese Zeile nicht löschen.
        parent::Create();

        $this->RegisterPropertyString('Targets', '[]');
    }

    // Überschreibt die intere IPS_ApplyChanges($id) Funktion
    public function ApplyChanges() {
        // Diese Zeile nicht löschen
        parent::ApplyChanges();

    }

    /**
     * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
     * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
     *
     * ANM_FK_countwindows($id);
     *
     */
    public function MyTool() {

        $targets = json_decode($this->ReadPropertyString('Targets'));
        $counter =0;

        foreach ($targets as $target) {
            $counter+=1;
        }

        $this->Updateformfield("Test", "caption", strval($counter));

    }
}