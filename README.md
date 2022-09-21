# phtfao/feegow

## Execução
Este é um pacote com o código fonte principal.
Sua execução depende do esqueleto de algum framework.

Para testar o aplicativo, clone o esqueleto do `Laravel` pré-configurado:
```
git clone git@github.com:phtfao/laravel-skeleton.git feegow
```
Em seguida, entre no diretório clonado e execute o `Docker`

```
docker compose up
```
Este comando construirá as imagens e subirá os containers necessário para rodar o aplicativo.
Após subir os container, rode o script de configuração (dentro do contaiber):
```
docker exec -it feegow-php-fpm-1 sh start.sh 
```
A aplicação estará disponível em [http://localhost:26000](http://localhost:26000).

Para executar os testes unitários execute:
```
docker exec -it feegow-php-fpm-1 composer test
```
O banco de dados estará disponível em localhost:26002

Usuário: `webmaster` e senha `segredo`

Para execução em ambiente sem o docker os requisitos são:
- PHP 8.1 com extensão do Mysql
- MySql 8
- Composer 2.4
