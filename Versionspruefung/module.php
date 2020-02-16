<?php
// Klassendefinition
class Versionspruefung extends IPSModule {

    // Überschreibt die interne IPS_Create($id) Funktion
    public function Create() {
        // Diese Zeile nicht löschen.
        parent::Create();

        $this->RegisterVariableString("AktuelleVersion", "Aktuelle Version");
        $this->RegisterVariableString("VerfuegbareVersion", "Verfügbare Version");

    }

    // Überschreibt die intere IPS_ApplyChanges($id) Funktion
    public function ApplyChanges() {
        // Diese Zeile nicht löschen
        parent::ApplyChanges();

        $this->SetValue("AktuelleVersion", IPS_GetKernelVersion());

        $rawData = file_get_contents('https://apt.symcon.de/dists/stable/win/binary-i386/Packages');
        $xml = simplexml_load_string($rawData);
        $version = $xml->channel->item->enclosure->attributes('sparkle',true)->shortVersionString;
        $this->SetValue("VerfuegbareVersion", strval($version));
    }

    /**
     * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
     * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
     *
     * ABC_MeineErsteEigeneFunktion($id);
     *
     */
    public function MeineErsteEigeneFunktion() {
        // Selbsterstellter Code
    }
}
