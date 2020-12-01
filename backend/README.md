# Supplycart Interview Case Study

### Server Setup
```
composer install
php artisan key:generate
php artisan jwt:secret
```

### Api Documentation
http://127.0.0.1/docs/index.html

- How to generate the api documentation
https://apidocjs.com/
```
apidoc -i './app/Http/Controllers/Api' -o './public/docs'
```
