## Test project Backend

#### Pour installer le projet 

- Cloner le repository
- docker-compose up -d --build
- docker exec -it app_koth bash
- composer install 
- php bin/console d:d:c
- php bin/console make:migration
- php bin/console d:m:m

#### Exécuter les fixtures
- php bin/console d:f:l

#### les routes principales
- http://localhost:8080/api/docs (Accès à l'api docs)
- http://localhost:8080/api/login_check
  (authentification)
-  http://localhost:8080/api/parcels/8e811f98-3c34-461b-9dd7-b9d74ac3a01e (Récupération du parcel)
