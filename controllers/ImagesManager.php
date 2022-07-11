<?php
require './models/Image.php';
// require '../dotenv.php'; // lien fonctionnel

class ImagesManager
{
    private $db;

    public function __construct()
    {
        $dbConfig = parse_ini_file('db.ini');

        if ($dbConfig === false) {
            echo 'Erreur : problème de configuration.';
            exit;
        }

        try {
            $this->db = new PDO(
                $dbConfig['DB_DSN'],
                $dbConfig['DB_USER'],
                $dbConfig['DB_PASSWORD']
            );
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            // En cas d'erreur :
            // On envoie le message d'erreur dans un fichier .log (création automatique s'il n'existe pas)
            file_put_contents('dblogs.log', $exception->getMessage() . PHP_EOL, FILE_APPEND);
            // On affiche un message à l'utilisateur et on arrête tout
            exit('Erreur : Impossible de se connecter à la base de données');
        }
    }

    public function create(Image $image)
    {
        $req = $this->db->prepare("INSERT INTO `image` (name, path) VALUE (:name, :path)");

        $req->bindValue(":name", $image->getName(), PDO::PARAM_STR);
        $req->bindValue(":path", $image->getPath(), PDO::PARAM_STR);

        $req->execute();
        $req->closeCursor(); // Libère la connexion au serveur, permet ainsi à d'autres requêtes SQL d'être exécutées, mais laisse la requête dans un état lui permettant d'être de nouveau exécutée.
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `image` WHERE id = :id");
        $req->execute([":id" => $id]);
        $data = $req->fetch();
        return new Image($data);
    }

    public function getLastImageId() // Cette fonction affecte l'image associée à l'id le plus récent en BDD. Impossible d'utiliser une image déjà existante.
    {
        $req = $this->db->query("SELECT * FROM `image` ORDER BY id DESC LIMIT 1");
        return $req->fetch()["id"];
    }

    public function update(Image $image)
    {
        $req = $this->db->prepare("UPDATE `image` SET name = :name, path = :path WHERE recipe_id = :id");

        $req->bindValue(":name", $image->getName(), PDO::PARAM_STR);
        $req->bindValue(":path", $image->getPath(), PDO::PARAM_STR);
        $req->bindValue(":id", $image->getId(), PDO::PARAM_INT);
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
