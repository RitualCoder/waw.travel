# waw.travel

# Des infos pour dev avec ce framework... 😊

## fichier dans le dossier de config : 
- les routes
- la connexion à la bdd
- la sécurisation
- etc...

## fichier dans le dossier lib : 
- autoload.php qui permet de ne pas faire les appels de fichier (require, include)
- le dossier Router
    - Permet de faire le dispatch 
- le dossier Controller
    - Contient les classes propres au framework qui ne peuvent être appelées qu'en extends des autres classes
- le dossier Manager
    - Contient les informations permettant de gérer les manipulations de données

## fichier dans le dossier public : 
- l'index.php qui est le point d'entrée de l'application
- les dossiers css et js et images

## fichier dans le src : 
- le dossier Controller qui utilise les fonctions du framework et qui renvoie à la vue

## fichier dans le template : 
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