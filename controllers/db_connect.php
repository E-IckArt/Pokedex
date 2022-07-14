<?php
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
    // En cas d'erreur :
    // On envoie le message d'erreur dans un fichier .log (création automatique s'il n'existe pas)
    file_put_contents('dblogs.log', $exception->getMessage() . PHP_EOL, FILE_APPEND);
    // On affiche un message à l'utilisateur et on arrête tout
    exit('Erreur : Impossible de se connecter à la base de données');
}
