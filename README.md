# DentalUp

## Pré Requisitos
- Download PHP 7.4.28;
- Download composer and install;
- Altera informações da configuração do banco no arquivo config.php localizado na pasta config na raiz do diretório.
- Mudar as configurações do Apache no Xampp - em C:\xampp>\apache\conf nome do arquivo: httpd.conf - 
#LoadModule rewrite_module modules/mod_rewrite.so para 
LoadModule rewrite_module modules/mod_rewrite.so e 
AllowOverride None para AllowOverride All;
- Iniciar o Xampp junto iniciando o Apache e o MySQL;
- Testar o site pela url - http://localhost/web-servidor-dev;

## Sobre o sistema
O sistema DentalUp é uma proposta de gerenciamento de consultas, clientes e cirurgiões-dentistas para consultórios.
O sistema permite o cadastro de clientes, através do painel admin é possível cadastrar funcionários e há também um 
usuário do tipo admin que possui todas as permissões. Nesse sentido, o sistema conta com autênticação de login e diferentes
perfis (roles) de usuários.

Até o momento não foram implementadas todas as funcionalidades.
Nessa primeira etapa priorizamos criar o escopo para o projeto, arquitetar a estrutura de diretórios e afins.
Desta forma, há possibilidade de cadastrar-se porém sem um perfil definido (role), também foi implementada a validação de login, 
autênticação de sessões e o uso do banco de dados.

## Partes desenvolvidas por cada integrante:

#### Maria Eduarda Freitas (RA: 2328585)
Responsável por desenvolver o front-end incluindo formulários de login, cadastro e tela dashboard.
O principal objetivo foi criar telas com design clean para facilitar a visualização e entendimento
do usuário, promovendo desta forma uma iteração humano computador que resultasse em uma boa experiência
para o usuário.
As principais tecnologias utilizadas foram HTML e CSS.

#### Bruna Nunes (RA: 2328585) 
Responsável por desenvolver o back-end onde foram feitas validações, autênticação com sessões,
cadastro e inclusão de dados no banco.
As prinicipais tecnologias utilizadas foram PHP, MySQL, Workbench e, além destas, a arquitetura MVC.

#### Leodocir Neto (RA: 2257122)
Responsável por criar as regras de negócio, redigir a documentação e 
auxiliar no desenvolvimento através da instalação do projeto em demais máquinas para fins de teste.
