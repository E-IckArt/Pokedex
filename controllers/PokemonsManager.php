<?php
require './models/Pokemon.php';
// require '../dotenv.php'; // lien fonctionnel


class PokemonsManager
{
    private $db;

    public function __construct()
    {
        require 'db_connect.php';
    }

    public function create(Pokemon $pokemon)
    {
        $req = $this->db->prepare("INSERT INTO `pokemon` (number, name, description, type1, type2, image) VALUE (:number, :name, :description, :type1, :type2, :image)");

        $req->bindValue(":number", $pokemon->getNumber(), PDO::PARAM_INT);
        $req->bindValue(":name", $pokemon->getName(), PDO::PARAM_STR);
        $req->bindValue(":description", $pokemon->getDescription(), PDO::PARAM_STR);
        $req->bindValue(":type1", $pokemon->getType1(), PDO::PARAM_INT);
        $req->bindValue(":type2", $pokemon->getType2(), PDO::PARAM_INT);
        $req->bindValue(":image", $pokemon->getImage(), PDO::PARAM_INT);

        $req->execute();
        $req->closeCursor();
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `pokemon` WHERE id = :id");
        $req->execute([":id" => $id]);
        $data = $req->fetch();
        return new Pokemon($data);
    }

    public function getAll(): array
    {
        $pokemons = [];
        $req = $this->db->query("SELECT * FROM `pokemon` ORDER BY number");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $pokemon = new Pokemon($data);
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }

    public function getAllByString(string $input)
    {
        $pokemons = [];

        $req = $this->db->prepare("SELECT * FROM `pokemon` WHERE name LIKE '%:input%' ORDER BY number");
        $req->bindValue(':input', $input, PDO::PARAM_STR);
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $pokemon = new Pokemon($data);
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }

    public function getAllByType(string $input)
    {
        $pokemons = [];
        $req = $this->db->prepare("SELECT * FROM `pokemon` WHERE type LIKE :input ORDER BY number");
        $req->bindValue(":input", $input, PDO::PARAM_STR);
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $pokemon = new Pokemon($data);
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }

    public function update(Pokemon $pokemon)
    {
        $req = $this->db->prepare("UPDATE `pokemon` SET number = :number, name = :name, description = :description, type1 = :type1, type2 = :type2, image = :image WHERE id =:id ");

        $req->bindValue(":id", $pokemon->getId($_GET['id']));
        $req->bindValue(":number", $pokemon->getNumber(), PDO::PARAM_INT);
        $req->bindValue(":name", $pokemon->getName(), PDO::PARAM_STR);
        $req->bindValue(":description", $pokemon->getDescription(), PDO::PARAM_STR);
        $req->bindValue(":type1", $pokemon->getType1(), PDO::PARAM_INT);
        $req->bindValue(":type2", $pokemon->getType2(), PDO::PARAM_INT);
        $req->bindValue(":image", $pokemon->getImage(), PDO::PARAM_INT);

        $req->execute();
        $req->closeCursor();
    }

    public function delete(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `Pokemon` WHERE id = :id ");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
