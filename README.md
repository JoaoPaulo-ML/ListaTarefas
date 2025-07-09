## Avaliação faculdade

# Kanban - Gerenciador de Tarefas

Um aplicativo web completo para gerenciamento de projetos e tarefas, inspirado em plataformas como Trello.

## ✨ Funcionalidades Principais

-   **Autenticação de Usuários:** Sistema completo de registro e login utilizando o Laravel Breeze.
-   **Gerenciamento de Boards (Quadros):**
    -   Criação de múltiplos quadros para diferentes projetos.
    -   Cada usuário pode ser dono de seus próprios quadros.
-   **Sistema de Colaboração:**
    -   O dono de um board pode convidar outros usuários cadastrados para colaborar.
    -   Visualização de todos os boards dos quais você é dono ou membro em um único dashboard.
-   **Gerenciamento de Tarefas:**
    -   Criação de tarefas dentro de cada board.
    -   Visualização de detalhes das tarefas em um modal interativo.
    -   Organização das tarefas em três colunas: **Pendente**, **Em Andamento** e **Concluída**.
-   **Drag-and-Drop (Arrastar e Soltar):**
    -   Mova tarefas de forma fluida entre as colunas para atualizar seu status.
    -   A mudança é salva automaticamente no banco de dados através de uma requisição assíncrona.

## 🛠️ Tecnologias Utilizadas

-   **Backend:** PHP, Laravel
-   **Frontend:** Blade, Tailwind CSS, Alpine.js
-   **Banco de Dados:** MySQL
  
## ⚙️ Como executar o projeto localmente

1. **Clone o repositório:**
```bash
git clone git@github.com:SEU-USUARIO/SEU-REPOSITORIO.git
cd nome-do-projeto
```

2. **Instale as dependencias**
```bash
composer install
```
3. **Clone o arquivo env exemple e coloque a configuração do banco no arquivo**
```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario_do_banco
DB_PASSWORD=senha_do_banco
```

4. **Configure o SMTP para enviar as comfirmações pelo email**
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=Seu email
MAIL_PASSWORD=Senha
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=""
MAIL_FROM_NAME="${APP_NAME}"
```
5. **Dar o comando migrate para configurar o banco**
```bash
php artisan migrate
```
6. **Gerar key do app**
```bash
php artisan key:generate
```
7. **Criar o link publico do storage**
```bash
php artisan storage:link
```
8. **rodar o npm**
```bash
npm install
npm run dev
```
9. **rodar o servidor**
```bash
php artisan serve
```
