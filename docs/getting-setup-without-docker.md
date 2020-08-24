**[↤ Developer Overview](../README.md)**

Getting Setup without Docker
===

Requirements
---

* [PHP 7.2+](http://php.net/manual/en/install.php)
* [Composer](https://getcomposer.org)
* [Node](https://nodejs.org)


Install Dependencies
---

Using Docker is Super Easy once it's installed, you just need to run the following commands:

```bash
npm install
composer install
php artisan key:generate
php artisan config:cache
npm start
```


Build Website
---

Now that we have all the dependencies installed, we can build the website:

#### Build for Development

```bash
yarn run dev
```

#### Build for Production

```bash
yarn run production
```


Accessing the Website
---

Now you can open your web browser to [http://localhost:8000](http://localhost:8000)
