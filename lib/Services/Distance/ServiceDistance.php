<?php

namespace Plugo\Services\Distance;

require dirname(__DIR__, 3) . '/config/apiKey.php';

class ServiceDistance
{
    public function getTotalDistance($steps = [])
    {
        if (count($steps) < 2) {
            throw new \Exception('Il n\'y a pas assez d\'étapes pour calculer une distance.');
        }

        // Clé API Google Maps
        $apiKey = GOOGLE_MAPS_API_KEY;

        // Trier les étapes en fonction de leur numéro sinon la distance sera éronnée
        usort($steps, function ($a, $b) {
            return $a->getNumber() - $b->getNumber();
        });

        // Construire les coordonnées des étapes
        $waypoints = [];
        foreach ($steps as $step) {
            $latitude = $step->getLatitude();
            $longitude = $step->getLongitude();

            // Validation des coordonnées
            if (!is_numeric($latitude) || !is_numeric($longitude)) {
                throw new \Exception('Coordonnées invalides.');
            }

            $waypoints[] = "$latitude,$longitude";
        }

        $totalDistance = 0;

        // Construire l'URL de l'API Distance Matrix avec toutes les étapes
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins={$waypoints[0]}&destinations=" . implode('|', $waypoints) . "&key=$apiKey";

        // Effectuer la requête
        $response = file_get_contents($url);

        // Vérifier si la requête a réussi
        if ($response === FALSE) {
            throw new \Exception('Erreur lors de la requête vers Google Maps Distance Matrix API.');
        }

        // Convertir la réponse JSON en tableau associatif
        $data = json_decode($response, TRUE);

        // Vérifier si la réponse contient des éléments
        if (!empty($data['rows'][0]['elements'])) {
            // Calculer la distance totale
            foreach ($data['rows'][0]['elements'] as $element) {
                if (isset($element['distance']['value'])) {
                    $totalDistance += $element['distance']['value'];
                }
            }

            // Convertir la distance de mètres à kilomètres
            $totalDistanceInKilometers = $totalDistance / 1000;

            // Retourner la distance totale
            return round($totalDistanceInKilometers);
        } else {
            throw new \Exception('La réponse de l\'API ne contient pas d\'éléments.');
        }
    }
}
