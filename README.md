Instructions:
=============

### 1. Install all dependencies via composer ###

```
$ composer install
```

### 2. Install bootstrap and jquery via bower ###

```
$ bower install
```

### 3. Enter your database parameters in ###

```
app/config/parameters.yml
```

### 4. Create database and schema ###

```
$ ./bin/console doctrine:database:create
$ ./bin/console doctrine:schema:create
```

### 5. Fill database with fixtures ###

```
$ ./bin/console doctrine:fixtures:load
```

### 6. Start a Symfony server ###

```
$ ./bin/console server:start
```
### 7. Access the site on ###
```
http://localhost:8000/
```
