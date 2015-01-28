Atelier Création commande
=========================

Le but de cet atelier est de créer une commande qui permettrait de générer une entité. On prendra comme exemple d'entité un terrain d'aviation avec les champs "name", "latitude" et "longitude". 

Création du projet
--------------
  * ./composer.phar create-project symfony/framework-standard-edition atelier-cmd
  
  * cd atelier-cmd/

  * php app/console doctrine:database:create

  * curl 192.168.0.21/sf_bash/chmod.sh | sh
