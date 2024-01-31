<?php

namespace Plugo\Services\Upload;

class ServiceImage
{
    public function upload($file, $destinationDir)
    {
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Générez un identifiant unique pour le fichier
            $id = uniqid();

            // Construction du chemin de destination du fichier (absolue)
            $filePath = $destinationDir . $id . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

            $fileName = "images/uploads/" . $id . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

            // Déplacer le fichier téléchargé vers le dossier spécifié
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                return $fileName;
            } else {
                throw new \Exception('Erreur lors du déplacement du fichier téléchargé.');
            }
        } else {
            throw new \Exception('Erreur lors du téléchargement du fichier.');
        }
    }

    public function delete($filePath)
    {
        // Vérifier si le fichier existe
        if (file_exists($filePath)) {
            // Supprimer le fichier
            if (unlink($filePath)) {
                return true;
            } else {
                throw new \Exception('Erreur lors de la suppression du fichier.');
            }
        } else {
            throw new \Exception('Le fichier n\'existe pas.');
        }
    }
}
