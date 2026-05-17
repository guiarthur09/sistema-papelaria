# 🎀 Sistema de Papelaria — Mimos de Papel

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)

Sistema web desenvolvido em **PHP puro + MySQL** para gerenciamento de uma papelaria personalizada. Projeto criado do zero com foco no aprendizado de back-end, banco de dados relacional e autenticação de usuários.

---

## 🎯 Objetivo do Projeto

Exercitar os fundamentos do desenvolvimento web com PHP, como:

- Conexão e manipulação de banco de dados com PDO
- Autenticação de usuários com sessões e criptografia de senha
- Controle de acesso por nível de usuário (admin / usuário comum)
- CRUD completo de produtos e usuários
- Organização de projeto em pastas e boas práticas

---

## 🚀 Funcionalidades

### Área do Usuário
- Cadastro e login com autenticação segura
- Visualização de produtos em cards
- Logout com destruição de sessão

### Área do Administrador
- Painel exclusivo com controle de acesso por nível
- CRUD completo de produtos (criar, editar, excluir)
- CRUD completo de usuários (criar, editar, excluir)
- Listagem de todos os usuários cadastrados

---

## 🛠️ Tecnologias utilizadas

| Tecnologia | Uso |
|---|---|
| PHP 8.2 | Back-end e lógica do sistema |
| MySQL | Banco de dados relacional |
| PDO | Conexão segura com o banco |
| HTML5 | Estruturação das páginas |
| CSS3 | Estilização e identidade visual |
| Google Fonts | Tipografia (Playfair Display + DM Sans) |

---

## 🔐 Segurança

- Senhas criptografadas com `password_hash()` — bcrypt
- Proteção contra SQL Injection via PDO com prepared statements
- Controle de acesso por sessão e nível de usuário
- Páginas administrativas protegidas contra acesso direto

---

## 💻 Como rodar o projeto

Você vai precisar de um ambiente local com suporte a PHP e MySQL como **XAMPP** ou **WAMP**.

### 1. Clone o repositório

```bash
git clone https://github.com/guiarthur09/sistema-papelaria.git
```

### 2. Mova para o servidor local

- **XAMPP** → `C:/xampp/htdocs/sistema-papelaria`
- **WAMP** → `C:/wamp/www/sistema-papelaria`

### 3. Crie o banco de dados

- Abra o phpMyAdmin
- Crie um banco chamado `sistema_papelaria`
- Importe o arquivo `banco_sql.sql`

### 4. Configure a conexão

Copie o arquivo `config/conexao.example.php`, renomeie para `conexao.php` e preencha com seus dados:

```php
$host    = "localhost";
$dbname  = "sistema_papelaria";
$usuario = "root";
$senha   = "";
$port    = 3306;
```

### 5. Acesse no navegador

```
http://localhost/sistema-papelaria/login.php
```

---

## 👤 Criando o primeiro admin

Após importar o banco, rode este SQL no phpMyAdmin:

```sql
INSERT INTO usuarios (nome, nm_login, email, senha, tipo)
VALUES (
    'Administrador',
    'admin',
    'admin@admin.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'admin'
);
```
> Senha padrão: `password` — troque após o primeiro acesso.

---

## 📁 Estrutura do projeto

```
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
│   ├── conexao.php           ← não versionado
│   └── conexao.example.php   ← modelo de configuração
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
```

---

## 👨‍💻 Autor

Desenvolvido por **Guilherme Arthur** como projeto de estudo de PHP + MySQL.

[![GitHub](https://img.shields.io/badge/GitHub-guiarthur09-777BB4?style=flat&logo=github)](https://github.com/guiarthur09)
