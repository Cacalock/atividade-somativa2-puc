# Sistema de Cadastro, Questionários e Gerenciamento de Usuários

Este projeto é um sistema de gerenciamento de usuários, questionários e preferências em um servidor de Minecraft. Ele permite o cadastro de usuários, login, edição de perfil, exclusão de contas, preenchimento de questionários e administração dos dados. O sistema também inclui efeitos sonoros e controle de música para tornar a experiência do usuário mais interativa.

## Funcionalidades

- **Cadastro de Usuários**: Permite aos usuários criar uma conta fornecendo nome, email e senha.
- **Login de Usuários**: Usuários podem se autenticar utilizando email e senha.
- **Edição de Perfil**: Usuários autenticados podem editar suas informações pessoais.
- **Exclusão de Conta**: Usuários podem excluir suas contas.
- **Preenchimento de Questionários**: Os usuários podem preencher questionários com preferências sobre o servidor.
- **Administração**: Admins podem visualizar e excluir questionários e usuários.
- **Efeitos Sonoros e Música**: O sistema inclui música de fundo e sons de clique ao interagir com botões.

## Estrutura de Arquivos

### Páginas HTML

1. **login.html**: Formulário para login de usuários com campos para email e senha.
2. **agradecimento.html**: Exibe uma mensagem de agradecimento após o usuário realizar um registro ou ação no site.
3. **criarConta.html**: Permite aos usuários criar uma nova conta, fornecendo nome, email e senha.
4. **editaruser.html**: Página para editar o perfil do usuário, alterando nome de usuário, email e senha.
5. **excluirQuest.html**: Página para excluir um questionário existente.
6. **excluirUser.html**: Exibe uma página para o usuário excluir sua conta.
7. **index.html**: Página inicial com links para login, cadastro, questionário e outras opções.
8. **info.html**: Fornece informações sobre o servidor de Minecraft e como o site funciona.
9. **membros.html**: Exibe uma lista de membros da comunidade.
10. **opcoes.html**: Menu de opções para o usuário acessar o questionário, interagir com membros, etc.
11. **pegarQuestionario.html**: Exibe uma lista de questionários preenchidos pelos usuários.
12. **questionario.html**: Formulário de preferências dos usuários sobre o servidor de Minecraft.

### Scripts JavaScript

- **excluirQuest.js**: Gerencia a exclusão de questionários. Ao confirmar, o formulário é enviado.
- **excluirUsuario.js**: Gerencia a exclusão de usuários. Redireciona o usuário para a página de exclusão no servidor.
- **listarQuestionarios.js**: Lista os questionários preenchidos, buscando dados no servidor.
- **listarUsuarios.js**: Lista os usuários registrados, buscando dados no servidor.
- **questionario.js**: Envia o ID do usuário para o questionário via URL.
- **src.js**: Controla a música de fundo, sons de clique e autenticação do usuário.

### Arquivos PHP

- **EditarUsuario.php**: Permite editar os dados do usuário.
- **deletarQuestionario.php**: Exclui um questionário.
- **deletarUsuario.php**: Exclui uma conta de usuário.
- **listarQuestinarios.php**: Exibe todos os questionários preenchidos.
- **listarUsuarios.php**: Exibe todos os usuários registrados.
- **login.php**: Processa o login de usuários.
- **pegarQuestionario.php**: Exibe detalhes de um questionário específico.
- **pegarUsuario.php**: Exibe informações de um usuário específico.
- **register.php**: Processa o registro de novos usuários.
- **respostas.php**: Recebe e armazena as respostas de um questionário.

### Arquivos CSS

- **footer.css**: Estiliza o rodapé fixo da página.
- **formulario.css**: Estiliza o formulário de cadastro e edição de perfil.
- **framework.css**: Fornece estilos para elementos de interação como botões e caixas de diálogo.
- **global.css**: Contém estilos gerais para o layout e estrutura da página.
- **index.css**: Estiliza a disposição dos elementos principais da página inicial.
- **info.css**: Aplica estilos ao conteúdo informativo, com imagens e ícones baseados no Minecraft.

## Requisitos

- **PHP 7.4 ou superior**
- **MySQL 5.7 ou superior**
- **Servidor Web (ex: Apache ou Nginx)**
- **Arquivos de Áudio**: Música de fundo (`wet_hands.mp3`) e som de clique (`random.click.ogg`) devem estar disponíveis no servidor.

## Como Usar

1. **Configuração do Servidor PHP**: Certifique-se de que os arquivos PHP estão corretamente configurados no servidor.
2. **Arquivos de Áudio**: Garanta que os arquivos de áudio estejam acessíveis nos caminhos corretos.
3. **Acesso ao Questionário**: O usuário precisa estar autenticado para acessar o questionário. Caso contrário, será redirecionado para a página de login.

## Funcionamento

- **Música de fundo**: O usuário pode alternar entre iniciar e pausar a música de fundo.
- **Som de clique**: Ao clicar em botões com a classe `.btnSound`, um som de clique será tocado.
- **Autenticação**: O sistema verifica se o usuário está autenticado antes de permitir o acesso ao questionário.
- **Exclusão de Questionários e Usuários**: O sistema permite aos administradores e usuários excluir questionários e contas de usuário.
- **Listagem de Questionários e Usuários**: Exibe as informações dos questionários e usuários em uma tabela, com a opção de excluir.

## Conclusão

Este sistema oferece uma interface interativa para gerenciar usuários, questionários e preferências no servidor de Minecraft, além de incluir funcionalidades de áudio para melhorar a experiência do usuário. Certifique-se de que todas as dependências PHP e áudio estejam configuradas corretamente para um funcionamento completo.
