**[↤ Developer Overview](../README.md)**

Getting Setup with Docker ( Recommended )
===

![Docker Logo](img/docker-logo.png "Docker Logo")

#### Good News, You only need to do this initial setup once ;)

Requirements
---

* [Docker](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/install/)

Setup Development Environment
---

You can use your local laptop to do development, we are just using Docker to host the website.  So let's get your local machine ready.

```bash
npm install
```

Setup Docker Containers
---

Build the Docker Containers we need:

```bash
docker run --rm -v $(pwd):/app composer install
docker-compose up -d
```

Now we can setup our Laravel App in Docker

```bash
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan config:cache
```

Build Website
---

Now that we have all the dependencies installed, we can build the website.

#### Build for Development

Generated Static Assets for Development Environment ( Source Maps & Uncompressed Assets ).

```bash
npm run dev
```

#### Build for Production

Generated Static Assets for Development Environment ( No Source Maps & Compressed Assets ).


```bash
npm run production
```

Accessing the Website
---

Now you can open your web browser to [http://127.0.0.1:8000](http://127.0.0.1:8000)

Managing Docker
---

From your local development machine, you can manage our docker containers using `docker-compose`

| command                  | description                                                     |
|--------------------------|-----------------------------------------------------------------|
| `docker-compose up -d`   | Start Docker Services                                           |
| `docker-compose stop`    | Stop Docker Services                                            |
| `docker-compose restart` | Restart Docker Services                                         |
| `docker-compose logs`    | View output from Docker containers                              |
| `docker-compose down`    | Stop and remove Docker Containers, Networks, Images & Volumes   |


Managing Docker via NPM Scripts
---

Since you will likely be running NPM commands, these custom Docker NPM Scripts might come in handy.

| command                  | description                                                     |
|--------------------------|-----------------------------------------------------------------|
| `npm run docker:start`   | Start Docker Services                                           |
| `npm run docker:stop`    | Stop Docker Services                                            |
| `npm run docker:restart` | Restart Docker Services                                         |
| `npm run docker:logs`    | View output from Docker containers                              |
| `npm run docker:down`    | Stop and remove Docker Containers, Networks, Images & Volumes   |
| `npm run docker:clean`   | Run Laravel Clean Commands to Reset PHP Application             |