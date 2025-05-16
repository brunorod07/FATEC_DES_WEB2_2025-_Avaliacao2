# 🛍️ Sistema Loja - Avaliação 2 | Desenvolvimento Web II

Este projeto foi desenvolvido como parte da **Segunda Avaliação da disciplina Desenvolvimento Web II** do curso de Desenvolvimento de Sisitemas Multiplataforma na **Fatec Araras** (2º semestre de 2025).

O sistema simula uma **lojinha virtual**, onde o(a) lojista pode cadastrar, visualizar e remover produtos, mantendo o catálogo sempre atualizado. O acesso às funcionalidades só é possível após autenticação do usuário.

---

## 🎯 Funcionalidades

* **Login/Logout:** Acesso restrito com autenticação via usuário e senha.
* **Cadastro de Produtos:** Nome, preço, descrição e categoria.
* **Listagem de Produtos:** Exibe todos os produtos cadastrados no banco.
* **Remoção de Produtos:** Remove produtos com base no ID.

---

## 🧱 Tecnologias Utilizadas

* **PHP (Orientado a Objetos)**
* **MySQL com PDO**
* HTML5 + CSS3
* XAMPP (Ambiente de desenvolvimento local)

---

## 📁 Estrutura do Projeto

```
📂 /code
│
├── 📄 index.php              → Página de login
├── 📄 home.php               → Menu principal após login
├── 📄 cadastrar.php          → Cadastro de produtos
├── 📄 listar.php             → Lista todos os produtos
├── 📄 remover.php            → Remoção de produto por ID
└─  📄 login.php              → Script com a lógica de login
│
├── 📂 /classes
│   ├── 📄 login.php          → Classe Login (autenticação)
│   └── 📄 DB.php             → Classe DB (acesso ao banco de dados via PDO)
│
└── 📄 loja.sql               → Script SQL para criação do banco e tabela
```

---

## 🔑 Acesso ao sistema

Para fins de avaliação, utilize:

* **Usuário:** `admin`
* **Senha:** `admin`

---

## 🗃️ Banco de Dados

O arquivo `loja.sql` deve ser importado no MySQL. Ele cria o banco `artesanato_db` e a tabela `produtos_artesanais` com os campos:

* `id` (INT, auto-incremento)
* `nome_produto` (VARCHAR 100)
* `preco` (DECIMAL 10,2)
* `descricao` (VARCHAR 255)
* `categoria` (VARCHAR 30)

---

## 👨‍💻 Execução

1. Clone o repositório em seu ambiente local:

   ```bash
   git clone https://github.com/brunorod07/FATEC_DES_WEB2_2025-_Avaliacao2.git
   ```

2. Inicie o Apache e MySQL via XAMPP.

3. Importe o `loja.sql` no **phpMyAdmin**.

4. Acesse via navegador:

   ```
   http://localhost/code/index.php
   ```

---

## 📌 Observações

* O código segue boas práticas de encapsulamento com PHP orientado a objetos.
* Toda interação com o banco de dados é feita por meio da classe `DB.php` utilizando **PDO**, evitando SQL “espalhado” pelo sistema.
* As ações de cadastrar, remover e visualizar produtos só podem ser feitas após login.

---

## ✍️ Autor

**Bruno Eduardo Rodrigues**
Aluno da **Fatec Araras - Sistemas para Internet**
Disciplina: **Desenvolvimento Web II**
Professor: **Orlando Saraiva Jr.**

---
