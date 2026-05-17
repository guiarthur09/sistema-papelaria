🎀 Mimos de Papel — Sistema de Papelaria
Sistema web desenvolvido em PHP puro + MySQL para gerenciamento de uma papelaria personalizada. Projeto criado do zero com foco em aprendizado de back-end, banco de dados e autenticação de usuários.

📋 Funcionalidades
Área do Usuário

- Cadastro e login com autenticação segura
- Visualização de produtos em cards
- Logout com destruição de sessão

Área do Administrador

- Painel exclusivo com controle de acesso por nível
- CRUD completo de produtos (criar, editar, excluir)
- CRUD completo de usuários (criar, editar, excluir)
- Listagem de usuários cadastrados


🛠️ Tecnologias utilizadas

PHP 8.2 — back-end e lógica do sistema
MySQL — banco de dados relacional
PDO — conexão segura com o banco
HTML5 + CSS3 — interface e estilização
Google Fonts — tipografia (Playfair Display + DM Sans)
XAMPP — ambiente de desenvolvimento local


🗂️ Estrutura do projeto
sistema-papelaria/
├── admin/
│   ├── cadastros-produtos.php
│   ├── cadastros-usuarios.php
│   ├── editar-produtos.php
│   ├── editar-usuarios.php
│   ├── excluir-produtos.php
│   ├── excluir-usuarios.php
│   ├── main-admin.php
│   └── produtos-admin.php
├── config/
│   ├── conexao.php          ← não versionado
│   └── conexao.example.php  ← modelo de configuração
├── css/
│   ├── style.css
│   ├── main.css
│   ├── main-admin.css
│   ├── produtos.css
│   ├── produtos-admin.css
│   └── editar-usuarios-produtos.css
├── img/
│   └── logo.png
├── cadastro.php
├── login.php
├── logout.php
├── main.php
├── produtos.php
├── banco_sql.sql
├── .gitignore
└── README.md

🚀 Como rodar o projeto
Pré-requisitos

XAMPP instalado
PHP 8.0+
MySQL

Passo a passo
1. Clone o repositório:
bashgit clone https://github.com/guiarthur09/sistema-papelaria.git
2. Mova para a pasta do XAMPP:
C:\xampp\htdocs\sistema-papelaria
3. Crie o banco de dados:

Abra o phpMyAdmin
Crie um banco chamado sistema_papelaria
Importe o arquivo banco_sql.sql

4. Configure a conexão:

Copie o arquivo config/conexao.example.php
Renomeie para config/conexao.php
Preencha com seus dados:

php$host    = "localhost";
$dbname  = "sistema_papelaria";
$usuario = "root";
$senha   = "";
$port    = 3306;
5. Acesse no navegador:
http://localhost/sistema-papelaria/login.php

🔐 Segurança

Senhas criptografadas com password_hash() — bcrypt
Proteção contra SQL Injection via PDO com prepared statements
Controle de acesso por sessão e nível de usuário (admin / usuario)
Páginas administrativas protegidas contra acesso direto


👤 Criando o primeiro admin
Após importar o banco, rode este SQL no phpMyAdmin para criar o usuário administrador:
sqlINSERT INTO usuarios (nome, nm_login, email, senha, tipo)
VALUES (
    'Administrador',
    'admin',
    'admin@admin.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'admin'
);

Senha padrão: password — troque após o primeiro acesso.


📸 Identidade Visual
O sistema foi estilizado com base na identidade visual da Mimos de Papel Papelaria Personalizada, com paleta em tons de rosa e tipografia elegante.