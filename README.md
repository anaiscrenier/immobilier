# SYMFONY

## COMPOSER

## GIT

- créer un dépot distant sur GitHub
- dans un nouveau dossier terminal, aller dans le dossier immobilier ...

cd/Applications/MAMP/htdocs/immobilier
...
- initialiser Git : 
...

git init
...

-relier le dépot distant :
...

git remote add origin https://github.com/anaiscrenier/immobilier.git
...

- ajouter des fichiers : 
...

git add *
...

git commit -m "..." ( ont mes ce qu'ont veux)
...
...

git push origin master
...

## APACHE-PACK

- barre de  débug : 
...
MAC=> php ~/composer.phar require symfony/apache-pack
WIN => composer require symfony/apache-pack
...

## CONTROLEUR

- créer un controleur :
...

php bin/console make:controller
...

## BASE DE DONNEES

- ligne 32 dans .env (y modifier avec les informations de connexion phpMyadmin):
...

DATA