# Instalação

Faça um git clone do projeto php-mvc:

```
git clone git@github.com:viniciusmattosrj/php-mvc.git
```

## Encoding

Todos os arquivos estão em **UTF-8**.

#### Importante para que o git não considere alterações de permissão como modificações a serem rastreadas

```
git config core.fileMode false
```

#### Arquivos de Configuração

```
cp -v docker-compose.yml.example docker-compose.yml

cp -v .env.example .env
```

&nbsp;

#### Configurações do .env:

|     Valor     | O que é?                              |   Exemplos de Parâmetros    |
| :-----------: | ------------------------------------- | :-------------------------: |
| DB_CONNECTION | Nome adapter da base de dados         |         ex: 'mysql'         |
|    DB_HOST    | Ip ou nome contaienr da base de dados | ex: '10.11.0.11' ou 'mysql' |
|    DB_PORT    | Port de conexão com base de dados     |         ex: '3306'          |
|  DB_DATABASE  | Nome da base dados                    |        ex: 'php_mvc'        |
|  DB_USERNAME  | Usuário de conexão com base de dados  |         ex: 'root'          |
|  DB_PASSWORD  | Senha de conexão com base de dados    |       ex: '123Mudar'        |

&nbsp;

#### Subir o container

Executar o seguinte comando no diretório do **php-mvc**:

```
docker-compose up -d
```

Ele fará com que os container específico do php-mvc sejam iniciado.

Execução fora container:

```
docker-compose exec php Makefile"
```

Execução dentro container:

```
docker-compose exec php bash -c "php -S 10.11.0.11:8008 -t public"
```

#### Instalando as dependências via composer

No projeto **php-mvc** execute o comando abaixo:

```
docker run --rm -v $(pwd):/app -v ~/.ssh:/root/.ssh composer install -vvv
```

#### Somente em ambiente de dev deve ser concedido a permissão nas pastas:

```
sudo chmod 777 -R keys vendor
```

#### Database e Migrations

MySQL:

```
docker exec -it mysql bash
mysql -u root -c "CREATE DATABASE php_mvc;";
```

Postgres:

```
docker exec -it postgres bash
psql -U webadm -c "CREATE DATABASE php_mvc";
```

Realizando a importação dump sql para a base criada:

MySQL: `mysql -u root -p php_mvc < /var/lib/mysql57/php_mvc.sql`

Postgres: `psql -U webadm php_mvc < /var/lib/postgresql/php_mvc.sql`

Execute os comandos abaixo:

```
Dentro do container: php vendor/bin/phinx migrate -e development
Fora do container: docker-compose exec php bash -c "php vendor/bin/phinx migrate -e development"
```

#### Criando os bancos de dados

Se conecte ao container do **postgres** com `docker exec -it postgres bash`

Realize o login com `mysql -u root` ou `psql -U webadm`

Em seguida crie as databases com os comandos:

```
CREATE DATABASE php-mvc;
CREATE DATABASE php-mvc_test;
```

#### Usando o php-mvc

Adicionar o ip do php-mvc no arquivo **/etc/hosts**:

```
10.11.0.11  php-mvc
```

O IP está definido no **docker-compose.yml** do php-mvc.

Se conectar, pelo navegador a:

```
http://php-mvc
```
