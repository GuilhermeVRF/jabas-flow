Jabas Flow

Sobre o Projeto

Jabas Flow é um sistema de controle financeiro pessoal baseado em uma arquitetura de microserviços. Ele foi desenvolvido para ajudar usuários a organizarem suas finanças de maneira eficiente e automatizada.

O sistema permite o cadastro de receitas e despesas, vinculação de orçamentos a categorias e configuração de recorrências. Quando uma recorrência é gerada, o sistema envia um e-mail automático como lembrete para o usuário.

Além disso, os usuários podem visualizar gráficos financeiros gerados via Python com Flask, tornando a análise de dados clara e intuitiva.

Funcionalidades

📅 Cadastro de Receitas e Despesas

📆 Orçamentos por Categoria

⏳ Recorrências com notificação por e-mail

📊 Gráficos Financeiros com Flask e Python

Tecnologias Utilizadas

Backend: Laravel (PHP)

Microserviço de Gráficos: Flask (Python)

Banco de Dados: MySQL

Ambiente: Docker

Repositório

🔗 Acesse o repositório no GitHub

Como Rodar o Projeto

Clone o repositório:

git clone https://github.com/GuilhermeVRF/jabas-flow.git
cd jabas-flow

Inicie os containers com Docker:

docker compose up

Acesse a pasta da aplicação Laravel:

cd app-laravel

Execute as migrações do banco:

php artisan migrate

Inicie o servidor Laravel:

php artisan serve


