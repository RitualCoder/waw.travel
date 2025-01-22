<img src="public/images/favicon.svg" alt="waw.travel" width="100"/>

# Waw.travel

Waw.travel est une plateforme communautaire gratuite permettant aux voyageurs de partager leurs road trips avec leur famille et leurs amis via une page web publique.

---

## Fonctionnalités

1. Authentification
2. Gestion des road trips

- Un road trip est défini par :
  - `Intitulé` : Nom du road trip.
  - `Type de véhicule` : Par exemple, moto, van, voiture.
- `Checkpoints` :
 Chaque road trip inclut au moins deux checkpoints (départ et arrivée)
  - `Nom du spot` : Identifiant descriptif du lieu.
  - `Coordonnées Google Maps` : données GPS pour localisation.
  - `Dates d'arrivée et de départ` : Pour chaque checkpoint.

3. Page publique du road trip

- Une URL unique pour chaque road trip : <https://waw.travel/{id-voyage}>.
- Présentation détaillée incluant les informations des checkpoints.
- API Google Maps : Calcul et affichage de la distance totale du trajet.
- Image de couverture : Permet de personnaliser la page publique du road trip.

---

## Installation

**Installez et configurez le framework PHP [Plugo](PLUGO.md)**

---

### Aperçu du projet

### Page d'accueil

<img src="public/images/home.png" alt="Page d'accueil" width="40%"/>

### Page de présentation d'un road trip

<img src="public/images/road-trip.png" alt="Page de présentation d'un road trip" width="40%"/>

### Page de connexion

<img src="public/images/login.png" alt="Page de connexion" width="40%"/>

### Page d'inscription

<img src="public/images/register.png" alt="Page d'inscription" width="40%"/>

### Page de liste des road trips

<img src="public/images/list.png" alt="Page de liste des road trips" width="40%"/>

### Page de création d'un road trip

<img src="public/images/create.png" alt="Page de création d'un road trip" width="40%"/>


### Page de profil

<img src="public/images/profil.png" alt="Page de profil" width="40%"/>