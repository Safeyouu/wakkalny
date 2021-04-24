<?PHP
	include "../config.php";
	include_once "../Model/sujet.php";

class ForumC
{
	public function afficherThreads()
	{
		$sql = "SELECT * FROM threads";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	
	public function ajouterThread($thread)
	{
		$sql = "insert into threads (utilisateur,titre,contenu)
			values (:utilisateur,:titre,:contenu)";
		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);
			$utilisateur = $thread->getUtilisateur();
			$titre = $thread->getTitre();
			$contenu = $thread->getContenu();
			$req->bindValue(':utilisateur', $utilisateur);
			$req->bindValue(':titre', $titre);
			$req->bindValue(':contenu', $contenu);
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}


	function supprimerThread($ID){
        try {
            $pdo = config::getConnexion();
            $req = $pdo->prepare(
                'DELETE FROM threads WHERE ID = :ID'
            );
            $req->execute([
                'ID' => $ID
            ]);
        } catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }


	public function updateThread($forum, $ID) {
		try {
			$db = config::getConnexion();
			$sql = "UPDATE threads SET utilisateur = :utilisateur, titre = :titre, contenu = :contenu WHERE ID = :ID";
			$req = $db->prepare($sql);
			$req->bindValue(':ID', $ID);
			$utilisateur = $forum->getUtilisateur();
			$titre = $forum->getTitre();
			$contenu = $forum->getContenu();
			$req->bindValue(':utilisateur', $utilisateur);
			$req->bindValue(':titre', $titre);
			$req->bindValue(':contenu', $contenu);
			$req->execute();
		} catch (PDOException $e) {
			$e->getMessage();
		}
	} 
	function recupererThread($ID){
		$db = config::getConnexion();
		try{
			$sql="SELECT * from threads where ID=:ID";
			$req=$db->prepare($sql);
			$req->bindValue(':ID',$ID);
			$req->execute();

			$thread=$req->fetch();
			return $thread;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}

}
