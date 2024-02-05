# waw.travel

# Des infos pour dev avec ce framework... 😊

## fichier dans le dossier config : 
- les routes
- la connexion à la bdd
- la connexion aux APIs
- etc...

## fichier dans le dossier lib : 
- autoload.php qui permet de ne pas faire les appels de fichier (require, include)
- le dossier Router
    - Permet de faire le dispatch 
- le dossier Controller
    - Contient les classes propres au framework qui ne peuvent être appelées qu'en extends des autres classes
- le dossier Manager
    - Contient les informations permettant de gérer les manipulations de données
- le dossier Service
    - Contient les services suplémentaires tel que la protection aux failles XSS, l'upload d'image, l'authentification et les messages flash

## fichier dans le dossier public : 
- l'index.php qui est le point d'entrée de l'application
- les dossiers css et js et images

## fichier dans le dossier src : 
- le dossier Controller qui utilise les fonctions du framework et qui renvoie à la vue
- le dossier Entity qui contient les entitées
- le dossier Manager qui contient les informations permettant de gérer les manipulations de données des entitées

## fichier dans le dossier template : 
- le layout qui est la base du rendu client
- les partials (ex: header, footer, sidebar)
- les pages (généralement présente dans un dossier par controller)

## tailwind css
- Installer tailwind
`npm install`
- Lancer tailwind
`npm run watch`
- Attention lors de la création de l'output il faut modifier le lien présent dans le layout pour qu'il soit de cette manière
`<link href="outputStyles.css" rel="stylesheet">`
- Build tailwind pour la mise en production
`npm run build`

## Installer la base de donnée
- Créer le fichier **database.php** dans le dossier **config** à partir du fichier **database.exemple.php**
- Ajouter les informations nécessaires à la connexion à la base de données

## Ajouter la clé API Google Maps
- Créer le fichier **apiKey.php** dans le dossier **config** à partir du fichier **apiKey.exemple.php**
- Ajouter votre clé API Google Maps
