<?php
// Klassendefinition

class Fensterkontakte extends IPSModule {

    // Überschreibt die interne IPS_Create($id) Funktion
    public function Create() {
        // Diese Zeile nicht löschen. Wir aufgerufen, wenn Instanz erstellt wird oder IPS neu gestartet wird.
        parent::Create();

        $this->RegisterVariableString("AktuelleVersion", "Aktuelle Version");

    }

    // Überschreibt die intere IPS_ApplyChanges($id) Funktion
    public function ApplyChanges() {
        // Diese Zeile nicht löschen. Wird immer dann aufgerufen, wenn Create aufgerufen wird und wenn Änderungen bestätigt werden.
        parent::ApplyChanges();

        $this->SetValue("AktuelleVersion", IPS_GetKernelVersion());

    }

    /**
     * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
     * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
     *
     * VP_UpdateVersion($id);
     *
     */
    public function UpdateVersion() {

    }
}
