<?php
class Conexao {
    public static function getConexao() {
        return new PDO("mysql:host=localhost;dbname=festa", "root", "");
    }
}
