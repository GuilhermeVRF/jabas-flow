# Jabas Flow

<div align="center">
  <img src="https://raw.githubusercontent.com/GuilhermeVRF/jabas-flow/main/public/logo.png" alt="Jabas Flow Logo" height="200" />
</div>

## Sobre o Projeto

**Jabas Flow** é um sistema de controle financeiro pessoal baseado em uma arquitetura de **microserviços**. Ele foi desenvolvido para ajudar usuários a organizarem suas finanças de maneira eficiente e automatizada.

O sistema permite o cadastro de receitas e despesas, vinculação de orçamentos a categorias e configuração de **recorrências**. Quando uma recorrência é gerada, o sistema envia um **e-mail automático** como lembrete para o usuário.

Além disso, os usuários podem visualizar **gráficos financeiros** gerados via Python com Flask, tornando a análise de dados clara e intuitiva.

## Funcionalidades

- 📅 Cadastro de **Receitas e Despesas**
- 📆 **Orçamentos por Categoria**
- ⏳ **Recorrências** com notificação por e-mail
- 📊 **Gráficos Financeiros** com Flask e Python

## Tecnologias Utilizadas

- **Backend**: Laravel (PHP)
- **Microserviço de Gráficos**: Flask (Python)
- **Banco de Dados**: MySQL
- **Ambiente**: Docker

## Como Rodar o Projeto

1. Clone o repositório:

```bash
git clone https://github.com/GuilhermeVRF/jabas-flow.git
cd jabas-flow
```

2. Inicie os containers com Docker:

```bash
docker compose up
```

3. Acesse a pasta da aplicação Laravel:

```bash
cd app-laravel
```

4. Execute as migrações do banco:

```bash
php artisan migrate
```

5. Inicie o servidor Laravel:

```bash
php artisan serve
```

