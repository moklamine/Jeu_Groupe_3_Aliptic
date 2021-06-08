# Jeu_Groupe_3_Aliptic

Installation

    Cloner le projer en local :
    $ git clone https://github.com/moklamine/Jeu_Groupe_3_Aliptic.git
    
    Dans un terminal, monter les conteneurs Docker (MySQL, phpmyadmin, PHP 7.4-apache) 
    $ cd "Nom du fichier de projet"
    $ docker-compose up -d    
    
    Installer les dépendances symfony 4.4 avec Composer :
    $ docker exec -it "nom du container php" bash
    $ cd project
    $ composer install
    
