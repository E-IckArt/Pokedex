<?php
require './models/Image.php';
// require '../dotenv.php'; // lien fonctionnel

class ImagesManager
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

    public function create(Image $image)
    {
        $req = $this->db->prepare("INSERT INTO `image` (name, path) VALUE (:name, :path");

        $req->bindValue(":name", $image->getName(), PDO::PARAM_STR);
        $req->bindValue(":path", $image->getPath(), PDO::PARAM_STR);

        $req->execute();
        $req->closeCursor(); // Libère la connexion au serveur, permet ainsi à d'autres requêtes SQL d'être exécutées, mais laisse la requête dans un état lui permettant d'être de nouveau exécutée.
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `image` WHERE id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $data = $req->fetch();
        $image = new Image($data);
        $req->closeCursor();
        return $image;
    }

    public function getLastImageId()
    {
        $req = $this->db->query("SELECT * FROM `image` ORDER BY id DESC LIMIT 1");
        $req->closeCursor();
        return $req->fetch()["id"];
    }

    public function update(Image $image)
    {
        $req = $this->db->prepare("UPDATE `image` SET name = :name, path = :path, image1 = :image1, image2 = :image2");

        $req->bindValue(":name", $image->getName(), PDO::PARAM_STR);
        $req->bindValue(":path", $image->getPath(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }

    public function delete(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `image` WHERE id = :id ");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
