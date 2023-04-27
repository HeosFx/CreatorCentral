# CreatorCentral

## Introduction

Ce site a été réalisé par Maxime Blanchard et Flavian Theurel dans le cadre de l'UV WE4A. L'objectif
principal était de réaliser un site permettant de partager des messages avec d'autres utilisateurs.
Dans notre cas, nous avons choisi d'implémenter un site de partage relatif au DIY avec comme idée de base
l'imitation de Thingiverse.

## Disclaimer

Pour que le site Creator Central fonctionne optimalement, il est nécessaire que les fichiers sources du site
se trouvent dans le dossier adéquat de Xampp ou UWamp et que le dossier soit nommé "CreatorCentral".
On obtiendrait, par exemple, le chemin d'accès "C:\xampp\htdocs\CreatorCentral". (Les fichiers du site se trouveraient 
dans ce répertoire.)

De plus, il est nécessaire d'utiliser PHP 8.2.0 ainsi qu'une version de serveur 10.4.27-MariaDB pour s'assurer du bon 
fonctionnement du site.

L'identifiant de la base de donnée est : "root". <br>
Son mot de passe est : "". <br>
Il est possible de modifier ceci à partir de la ligne 14 du fichier "classes/SQLconn.php".

## Changements et améliorations apportées

### Page d'accueil

- Une partie de la page d'accueil a été reprise d'internet, à savoir les slides en arrière plan. Nous avons gardé la base 
proposée tout en l'adaptant à nos besoins. En effet, nous avons choisi cette solution par manque de connaissance en animation
sur CSS. Vous pourrez retrouver le code original de l'auteur en suivant ce lien : https://codepen.io/KamilDyrek/pen/ejmRxV

- Comme les slides sont placées en arrière plan (z-index = -1), nous avons superposé deux layers en les synchronisant à l'aide 
de JavaScript.

- Le bouton "En savoir plus" sur la 3e slide de la page d'accueil ouvre un pop-up présentant le site de façon plus détaillée.

- Les barres de recherche de la page d'accueil et du feed sont synchronisées et permettent d'effectuer des recherches dans le nom d'utilisateur,
le titre et le contenu des posts.

- Une fois la page d'accueil quittée (index.php), il n'est plus possible d'y retourner depuis l'interface du site. Ceci est tout à fait normal.
En effet, cette page a été pensée comme une introduction au site. Une fois que l'utilisateur s'est connecté, il n'a normalement plus besoin d'y retourner.
Il est toutefois possible d'y accéder en tapant manuellement l'url de la page.

### Connexion à un compte

- Les cookies session étant peu sécurisés, nous les avons remplacés par une session php côté serveur.
En effet, les cookies côté client sont facilement falsifiables.

- Nous utilisons également Bcrypt et salt pour le hachage des mots de passe. Ceci permet d'accroître 
la sécurité des utilisateurs.

- Pour empêcher tout envoie d'un formulaire invalide, nous avons implémenté une vérification dynamique des champs des pages d'inscription et de modification des postes ("editpost").

### Gestion des comptes

- Le nom d'utilisateur sert d'id dans la table "users". Ainsi, il est impossible d'avoir deux utilisateurs avec le même nom.

- Aller sur son profil permet de n'afficher dans le feed que ses posts.

### Écriture de post

- Le bouton "poster" est désactivé tant que le titre et le contenu du post sont vides. Cela permet d'empêcher les utilisateurs de poster des posts vides, ce qui polluerait le feed.

- Les posts supportent les gifs.

- Les images sont automatiquement ajustées à la taille maximale affichable d'une image dans un post tout en préservant son aspect ratio.

### Actions sur les posts

- Les utilisateurs peuvent liker les posts des autres utilisateurs. Un compteur apparait pour afficher le nombre de likes.

### Gestions des images

- Les images ajoutées par les utilisateurs dans leurs posts sont supprimées du serveur lorsqu'elles sont remplacées par une autre image ou que le post est supprimé.

### Esthétique

- Nous avons porté une attention particulière à l'esthétique du site en implémentant des animations et une interface utilisateur plus agréable d'utilisation.
