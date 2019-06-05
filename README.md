# annuaire
Annuaire pour le centre d'appel de la mairie de Nancy



Importation de la base de données:

via PHPmyadmin - Importer le fichier assets/sql/annuaire.sql (création de la base de données et ajout des données)



Configuration du projet:

1. Copier le fichier application/config/config-exemple.php en application/config/config.php

2. Copier le fichier application/config/database-exemple.php en application/config/database.php

3. Dans le fichier application/config/config.php changer l'url de base par votre nom de domaine
   
   $config['base_url'] = 'https://votredomaine.fr';

4. Configurer vos informations de la base de données dans le fichier application/config/database.php
