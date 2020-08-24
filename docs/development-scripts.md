**[↤ Developer Overview](../README.md)**

Development Scripts
===

Most of the repetitive tasks have been moved to Development Scripts you can run in terminal via `npm`.

If you are using Docker, connect to the Docker Container via `docker-compose exec workspace bash` before running these commands:

| command                 | description                                                     |
|-------------------------|-----------------------------------------------------------------|
| `npm run start`         | Start PHP Application in Browser                               |
| `npm run test-lint`     | Check PHP Code for Invalid Markup                               |
| `npm run test-unit`     | Run PHP Unit Tests                                              |
| `npm run test-coverage` | Generate Code Coverage Reports into `./reports/clover_html/`    |
| `npm run test`          | Runs `npm run test-lint` and `npm run test-unit`              |
| `npm run clean`         | Remove Generated JS & CSS Files                                 |
| `npm run clear-cache`   | Clear PHP Application Cache                                 |
| `npm run dev`           | Build Website for Development                                   |
| `npm run watch`         | Build Website for Development and Watch for Live Changes        |
| `npm run hot`           | Build Website for Development and Enable Hot Module Replacement |
| `npm run production`    | Build Website for Production                                    |
| `npm run help`          | Generates List of Scripts you can run                           |

Need Help ?
---

#### Get Description of Scripts

```bash
npm run help
```

#### Get Description on Specific Script

```bash
npm run help [name]
```