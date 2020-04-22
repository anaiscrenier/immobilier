# SYMFONY

## COMPOSER

- aller sur getcomposer.org, lien "download" sur la page d'accueil
- Windows : télécharger l'exécutable et le lancer
- Mac : ouvrir un terminal et suivre les instructions
- à ne pas réinstaller pour chaque nouveau projet Symfony

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

DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/idb_name?serverVersion=5.7
( pour moi ca sera cela : DATABASE_URL=mysql://root:root@127.0.0.1:8889/immobilier?serverVersion=5.7)

- créer la base :
...

php bin/console doctrine:database:create
...

- créer une entité (table) :
```
php bin/console make:entity
```
- migration :
```
php bin/console make:migration
```
```
php bin/console doctrine:migrations:migrate
```
​
## FIXTURES
​
- installer le bundle :
```
composer require --dev orm-fixtures
```
- remplir le fichier AppFixtures.php avec les données
- persist()
- flush()
- envoyer en bdd en écrasant :
```
php bin/console doctrine:fixtures:load
```
```
php bin/console doctrine:fixtures:load --append
```
- après avoir chargé les données, penser à renommer le fichier AppFixtures.php en ajoutant ~ ou _ devant

## LOGIN
​
- créer une entité "User" :
```
php bin/console make:user
```
- créer "l'authentification" :
```
php bin/console make:auth
```
- 1
- Authenticator
- SecurityController
- yes
​
- dans config/packages/security.yaml, décommenter :
```
- { path: ^/admin, roles: ROLE_ADMIN }
```
​
## REGISTER
​
- créer le formulaire d'inscription :
```
php bin/console make:registration-form
```
- rediriger vers admin quand connecté (ouvrir Authenticator.php vers ligne 100) :
```
return new RedirectResponse($this->urlGenerator->generate('admin'));
```
- installer RollerWorks :
```
composer require rollerworks/password-strength-bundle
```
- dans RegistrationFormType.php :
```
use Rollerworks\Component\PasswordStrength\Validator\Constraints\PasswordStrength;
```
- dans le builder de ce fichier, au niveau du mot de passe :
```
new PasswordStrength
```
- puis y ajouter les vérifications que l'on souhaite (minLength, minStrength, messages...) : voir documentation RollerWorks
​
## FORMULAIRES
​
- mise en forme Bootstrap, dans config/packages/twig.yaml :
```
form_themes: ['bootstrap_4_layout.html.twig']
```
​
## ROUTER DEBUG
​
- voir toutes les routes :
```
php bin/console debug:router
```
- obtenir des infos sur une route (si existe) :
```
php bin/console router:match /le_nom_de_votre_route
```
​