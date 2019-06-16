# MVC PHP
- <a href="https://medium.com/trainingcenter/mvc-framework-usando-a-arquitetura-sem-c%C3%B3digo-de-terceiros-bf95a744c66d">MVC framework: usando a arquitetura sem código de terceiros</a> - Leonardo Vilarinho


## Instalação

Realizar o git clone do projeto
```bash
git clone git@github.com:viniciusmattosrj/php-mvc.git
```

Entre pelo terminal ma pasta do projeto e rode:
```
cp ./docker-compose-example.php  ./docker-compose-example.php
```

Agora suba o servidor:
```
docker-compose up -d
```

Em outra aba do terminal se conecte no container do php e suba bult-in
```
docker exec -it postgres bash
php -S 10.11.0.2:8008 -t public
```


## Contribuições
Caso identifique pontos
que possam ser aprimorados envie o seu PR. ;-)


## License
[MIT](https://choosealicense.com/licenses/mit/)
