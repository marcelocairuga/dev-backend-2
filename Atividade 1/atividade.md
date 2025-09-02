# Atividade 1: Relembrando Back-end I

Esta atividade tem como objetivo praticar o uso do PDO e relembrar os conteúdos trabalhados na disciplina de Desenvolvimento Back-end I. 

## Descrição da Atividade

Você deverá desenvolver uma aplicação bem simples de controle de tarefas, contendo:

- uma página para login;
- uma página inicial com links para demais páginas;
- uma página com a listagem das tarefas do usuário logado;
- uma página com a listagem de todos os usuário.

Principais regras:

- Cada usuário vê apenas as suas tarefas;
- Apenas o administrador tem acesso página de usuários;
- O usuário pode deletar suas tarefas.

Observações:

- Mantenha a implementação simples e enxuta;
- O foco não é padrão de projeto;
- Não precisa de estilização.

## Etapas Principais

### 1. Revise a sintaxe do PDO

- Acesse a página [Guia Rápido PDO](https://www.notion.so/Guia-R-pido-PDO-26258e4e0e1980199066e10d240e7d29?pvs=21) para revisar o uso básico do PDO.

### 2. Prepare o banco de dados

- No MySQL, crie um banco dados chamado **aula** (ou outro nome de sua preferência);
- Crie um script PHP para criar as tabelas e inserir os dados de exemplo. Utilize os dados de exemplo do [Guia Rápido PDO](https://www.notion.so/Guia-R-pido-PDO-26258e4e0e1980199066e10d240e7d29?pvs=21).

### 3. Implemente a página inicial

- A página inicial deve possui apenas um menu simples com links para:
    - página de tarefas;
    - página de usuários (caso o usuário seja um administrador);
    - logout.
- Se a página for acessado sem um usuário autenticado, redirecionar para a página de login.

### 4. Implemente a página de login

- Crie um formulário onde o usuário informa seu email e sua senha para logar no sistema;
- Utilize a função password_verify() para verificar a senha;
- Caso o login seja bem sucedido, redirecione para a pagina inicial.

### 5. Implemente a página de tarefas

- A página deve apresentar um tabela com as tarefas do usuário autenticado;
- Se a página for acessado sem um usuário autenticado, redirecionar para a página de login;
- Cada linha da tabela deve apresentar um botão para excluir a respectiva tarefa;
- Use o método POST para implementar a exclusão.

### 6. Implemente a página de usuários

- A página deve apresentar uma tabela com a lista de todos os usuário do sistema;
- Somente um administrador pode acessar essa página;
- Se não houver usuário autenticado, deve-se redirecionar para a página de login;
- Se o usuário não for administrador, exibir uma mensagem e um link para a página inicial.