# CRUD em PHP para Gerenciar Funcionários

Este é um projeto simples de CRUD em PHP para gerenciar funcionários, utilizando Docker Compose para o ambiente de desenvolvimento.

## Pré-requisitos

Certifique-se de ter o Docker e Docker Compose instalados em sua máquina. Para instalar o Docker Compose, siga as instruções em [Instalação do Docker Compose](https://docs.docker.com/compose/install/).

## Como Iniciar o Projeto

1. Clone este repositório:

   ```bash
   git clone https://github.com/daviramosds/crud-distro
   cd crud-distro

2. Execute o Docker Compose para iniciar os serviços:
   ```bash
   git clone https://github.com/daviramosds/crud-distro
   docker-compose up -d

Se a url não for "localhost", você deve alterar a constante INCLUDE_PATH no arquivo ./htdocs/config.php