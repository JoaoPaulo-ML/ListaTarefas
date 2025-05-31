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

4. **Dar o comando migrate para configurar o banco**
```bash
php artisan migrate
```
5. **Gerar key do app**
```bash
php artisan key:generate
```
6. **Criar o link publico do storage**
```bash
php artisan storage:link
```
7. **rodar o npm**
```bash
npm install
npm run build
```
8. **rodar o servidor**
```bash
php artisan serve
```
