### Variables
CMP=docker-compose
exec=docker exec -it app_koth bash

##### DOCKER #####

### Create and start containers
build: docker-compose.yml
	$(CMP) up -d --build

### Stop and remove containers
down: docker-compose.yml
	$(CMP) down

### Start containers
start: docker-compose.yml
	$(CMP) start

### log containers
logs: docker-compose.yml
	$(CMP) logs


##### PHP CLI #####
exec-php: docker-compose.yml
	$(exec)


