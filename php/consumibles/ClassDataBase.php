<?php

class BaseDeDatosLooksystem {

    var $error;
    var $conexion;
    var $numRegistros;
    var $registros;

    function conecta() {
        $this->conexion = pg_connect("host=localhost dbname=looksystem user=postgres password=19030837") or die("Error al conectar: " . pg_last_error());
    }
    function desconecta() {
        pg_close($this->conexion);
    }
    function query($consulta) {
        $this->error = false;
        $this->conecta();
        $this->registros = pg_query($consulta);
        $this->numRegistros = pg_num_rows($this->registros);
    }
    function obtenerRegistros($query) {
        $this->query($query);
        return pg_fetch_all($this->registros);
    }
    function obtenerRegistrosArray($query) {
        $this->query($query);
        return pg_fetch_array($this->registros);
    }
    function recuRegistro() {
        return pg_fetch_array($this->registros);
    }
    function obtenerRegistrosObj($query) {
        $this->query($query);
        return pg_fetch_object($this->registros);
    }
}
$db = new BaseDeDatosLooksystem();
