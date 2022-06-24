<?php
require './models/Type.php';
// require '../dotenv.php'; // lien fonctionnel

class TypesManager
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=pokedex;port=3306', 'root', '');
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            // En cas d'erreur :
            // On envoie le message d'erreur dans un fichier .log (création automatique s'il n'existe pas)
            file_put_contents('dblogs.log', $exception->getMessage() . PHP_EOL, FILE_APPEND);
            // On affiche un message à l'utilisateur et on arrête tout
            die('Erreur : Impossible de se connecter à la base de données');
        }
    }

    public function create(Type $type)
    {
        $req = $this->db->prepare("INSERT INTO `type` (name, color) VALUE (:name, :color");

        $req->bindValue(":name", $type->getName(), PDO::PARAM_STR);
        $req->bindValue(":color", $type->getColor(), PDO::PARAM_STR);

        $req->execute();
        $req->closeCursor(); // Libère la connexion au serveur, permet ainsi à d'autres requêtes SQL d'être exécutées, mais laisse la requête dans un état lui permettant d'être de nouveau exécutée.
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `type` WHERE id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $data = $req->fetch();
        $req->closeCursor();
        return new Type($data);
    }

    public function getAll(): array
    {
        $types = [];
        $req = $this->db->query("SELECT * FROM `type` ORDER BY name");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $type = new Type($data);
            $types[] = $type;
        }
        $req->closeCursor();
        return $types;
    }

    public function getAllByString(string $input)
    {
        $types = [];
        $req = $this->db->prepare("SELECT * FROM `type` WHERE name LIKE '%:input%' ORDER BY number");
        $req->bindValue(':input', $input, PDO::PARAM_STR);
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $type = new Type($data);
            $types[] = $type;
        }
        $req->closeCursor();
        return $types;
    }

    public function getAllByType(string $input)
    {
        $types = [];
        $req = $this->db->prepare("SELECT * FROM `type` WHERE type LIKE :input ORDER BY number");
        $req->bindValue(":input", $input, PDO::PARAM_STR);
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $type = new Type($data);
            $types[] = $type;
        }
        $req->closeCursor();
        return $types;
    }

    public function update(Type $type)
    {
        $req = $this->db->prepare("UPDATE `type` SET name = :name, color = :color, type1 = :type1, type2 = :type2");

        $req->bindValue(":name", $type->getName(), PDO::PARAM_STR);
        $req->bindValue(":color", $type->getColor(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }

    public function delete(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `type` WHERE id = :id ");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
