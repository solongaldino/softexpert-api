<!-- PROJECT LOGO -->
<br />
<p align="center">

  <h3 align="center">Softexpert gestão de vendas</h3>

  <p align="center">
    Repositório das aplicações Web e API
    <br />
  </p>
</p>

## Tabela de Conteúdo

- [Sobre o projeto](#sobre-o-projeto)
  - [Stack](#stack)
- [Iniciando](#iniciando)
  - [Pré-requisitos](#pré-requisitos)
  - [Instalação](#instalação)
- [Uso](#uso)
- [Contato](#contato)

<!-- ABOUT THE PROJECT -->

## Sobre o Projeto

Aplicação desenvolvida para atender os requisitos de um sistema de gestão para vendas, sem utilizar framerworks em seu backend, podendo utilizar bibliotecas. Ja seu frontend foi desenvolvido utilizando ReactJs com TypeScript e algumas bibliotecas.

A aplicação contas com as seguintes funcionalidades:

<ul>
  <li>Cadastro de impostos ou taxas</li>
  <li>Cadastro de tipos de produtos vinculado a taxas</li>
  <li>Cadastro de produtos</li>
  <li>Cadastro de vendas</li>
</ul>

### Stack

Essa seção lista as principais tecnologias/pacotes/bibliotecas utilizadas pela aplicação.

Geral:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/compose-file/)
- [Pgadmin](https://www.pgadmin.org/)
- [Ngix](https://www.nginx.com/)
- [Php-fpm](https://www.php.net/manual/pt_BR/install.fpm.php)

API:

- [Php8.2](https://www.php.net/)
- [DoctrineORM](https://www.doctrine-project.org/)
- [php-di](https://php-di.org/)
- [phpdotenv](https://github.com/vlucas/phpdotenv)
- [Postgres](https://www.postgresql.org/)

Web:

- [Reactjs](https://react.dev/)
- [Reactstrap](https://reactstrap.github.io/)
- [React Query](https://github.com/TanStack/query)
- [React Hook Form](https://reactstrap.github.io/)
- [Yup](https://github.com/jquense/yup)
- [Typescript](https://www.typescriptlang.org/)

OBS: Alguns recusos utilizaram imagem Docker.

## Iniciando

Abaixo há as instruções para configurar o projeto localmente.

Para gerar uma cópia local funcional, os seguintes passos devem ser seguidos:

### Pré-requisitos

E obrigatorio possuir instalado em sua maquina:

<ul>
  <li>Docker com verção superior ou igual 20.10.12</li>
  <li>Docker Compose com verção superior ou igual 1.29.2</li>
</ul>

### Instalação

1. Clone o repositório

```sh
git clone git@github.com:solongaldino/softexpert-test-full-stack-developer.git

```

## Uso

1. Dentro do repositório execute o comando abaixo para levantar a aplicação:

```sh
docker-compose up -d
```

caso queira acompanhar os logs

```sh
docker-compose up
```

2. Para acessar os recursos web você devera acessar as seguintes urls abaixo:

**Aplicação web EM DESENVOLVIMENTO**

```sh
http://localhost:8080
```

**Pgadmin**

```sh
http://localhost:16453
```

<ul>
  <li><strong>Email: </strong>admin@postgres.com</li>
  <li><strong>Senha: </strong>postgres</li>
</ul>

**API status**

```sh
http://localhost:9090/status
```

3. Para interagir com a API será nescessario utilizar algum cliente:

Exemplo de clientes:

- [Insomnia](https://insomnia.rest/)
- [Postman](https://www.postman.com/)

**Recomendado Insomnia**

No projeto contem o arquivo para importação contendo toda coleção de rotas.

**Comucação**

Request e Response em:

Content-Type: application/json; charset=UTF-8

**Rotas**

<ul>
  <li>
    Cadastro de imposto
    <br/>
    <img src="/doc/cadastro-de-imposto.png">
    <br/>
    <ul>
      <li><strong>metodo: </strong>POST</li>
      <li><strong>url: </strong>http://localhost:9090/taxes</li>
      <li>
        <strong>body: </strong>
        <br/>
        <ul>
          <li><strong>name: </strong>string</li>
          <li><strong>percentage: </strong>float | int</li>
        </ul>
      </li>
    </ul>
  </li>
  <br/>
  <li>
    Cadastro de tipo de produto
    <br/>
    <img src="/doc/cadastro-de-tipo-de-produto.png">
    <br/>
    <ul>
      <li><strong>metodo: </strong>POST</li>
      <li><strong>url: </strong>http://localhost:9090/products-type</li>
      <li>
        <strong>body: </strong>
        <br/>
        <ul>
          <li><strong>name: </strong>string</li>
          <li><strong>taxeId: </strong>int</li>
        </ul>
      </li>
    </ul>
  </li>
  <br/>
  <li>
    Cadastro de produto
    <br/>
    <img src="/doc/cadastro-de-produto.png">
    <br/>
    <ul>
      <li><strong>metodo: </strong>POST</li>
      <li><strong>url: </strong>http://localhost:9090/product</li>
      <li>
        <strong>body: </strong>
        <br/>
        <ul>
          <li><strong>productTypeId: </strong>int</li>
          <li><strong>name: </strong>string</li>
          <li><strong>value: </strong>float | int</li>
          <li><strong>description: </strong>string</li>
        </ul>
      </li>
    </ul>
  </li>
  <br/>
  <li>
    Salvar venda
    <br/>
    <img src="/doc/cadastro-de-venda.png">
    <br/>
    <ul>
      <li><strong>metodo: </strong>POST</li>
      <li><strong>url: </strong>http://localhost:9090/sales</li>
      <li>
        <strong>body: </strong>
        <br/>
        <ul>
          <li><strong>lista: </strong>array</li>
          <li><strong>Exemplo de lista: </strong>
          <br/>
          "list":[
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;{"productId": 1, "amount":10},
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;{"productId": 2, "amount":7}
            <br/>
            ]
          </li>
        </ul>
      </li>
    </ul>
  </li>
</ul>

Para cada rota existe seu par de listagem de dados

**Modelagem do banco de dados**
<br/><br/>
<img src="/doc/schema-db.png">
<br/><br/>

- O script de inicialização contendo dados encontra-se em:

```sh
/docker/files/postgres/scheme-db.sql
```

<!-- CONTACT -->

## Contato

Solon Galdino - solonfisicaufpb@gmail.com

_Link do Projeto: [Github](https://github.com/solongaldino/softexpert-test-full-stack-developer)_
