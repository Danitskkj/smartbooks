# SmartBooks – Sistema de Gerenciamento de Biblioteca

Projeto acadêmico desenvolvido em Laravel para a disciplina de Tópicos Especiais, simulando a demanda de uma empresa fictícia que necessita de um sistema interno para controlar autores, livros e empréstimos com acesso restrito a usuários autenticados.

## 🎯 Objetivo
Oferecer uma aplicação web simples, segura e extensível para gestão de acervos: cadastro de autores, organização de livros e controle básico de empréstimos.

## ✅ Principais Funcionalidades
- Autenticação completa (login, registro, logout) via Laravel Breeze
- Gestão de Autores (Nome, Nacionalidade, Ano de Nascimento)
- Gestão de Livros (Título, Ano de Publicação, Gênero, Quantidade Disponível, Autor)
- Gestão de Empréstimos (Data Retirada, Data Devolução, Status: pendente/devolvido)
- Relacionamentos exibidos nas listas (Livro → Autor, Empréstimo → Usuário + Livro)
- CRUD completo (criar, listar, editar, excluir) para todos os módulos
- Paginação (10 livros por página) e filtros (Título, Autor, Gênero)
- Validações e mensagens de sucesso/erro
- Interface responsiva com Blade + Tailwind (padrão Breeze)

## 🧩 Modelagem (resumo conceitual)
- Autor (1) — (N) Livros  
- Livro (1) — (N) Empréstimos  
- Usuário (1) — (N) Empréstimos  

## 🛠 Tecnologias
- Framework: Laravel 11
- Autenticação / Frontend base: Laravel Breeze (Blade + Tailwind CSS)
- Banco de Dados: SQLite (desenvolvimento) ou MySQL / MariaDB
- PHP: 8.2+
- Gerenciamento: Composer
- Opcional: npm (para build front caso necessário)

## 👥 Equipe
Daniel 

---

Pronto para evoluir: limpeza de código, testes e deploy em ambiente real (ex.: Laravel Forge, Docker ou VPS) podem ser próximos passos.
