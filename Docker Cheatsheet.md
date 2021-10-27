# Docker CheatSheet

## Laravel(laradock)

- To run Laradock(after cloning from github)

```docker-compose up -d nginx mysql phpmyadmin redis workspace```

- List All containers

```docker container ls --all```

- Docker Restart a container

```docker restart laradock_nginx_1```

- Docker ssh to workspace

```docker-compose exec workspace bash``` or ```docker exec -it boxom /bin/bash```

- Docker see all images and containers

```docker ps```

- Docker create mew shared folder between host and docker 

```docker run -dit -P --name boxom -v ~/Desktop/paxable-api:/data paxable-api_php```

- Docker start a container 

```docker container start "container_name"```

- Docker Stop a container 

```docker stop ubuntu-test```

- Docker run a pulled Image

```docker run -P -v ~/Desktop/paxable-api:/app webdevops/php-nginx```


# Multiple Projects on Laradock

https://github.com/laradock/laradock/issues/977#issuecomment-304161181

#if not found, make sure that ur in right repository

# Docker on Windows 10 “driver failed programming external connectivity on endpoint”

1) Close "Docker Desktop"

2) Run the commands below:

net stop com.docker.service
net start com.docker.service
3) Launch "Docker Desktop" again
# General Ubuntu Image
```yaml
version: '3'

services:
  ubuntu:
    image: Dockerfile
    tty: true
    volumes:
        - .:/home/
    ports:
        - "1000-1100:1000-1100"
    entrypoint:
        - /bin/bash

```

