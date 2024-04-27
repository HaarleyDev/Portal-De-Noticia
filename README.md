# Sistema de Portal de Notícias

Este é um sistema de portal de notícias desenvolvido para permitir a gestão e publicação de notícias por jornalistas e administradores. O sistema inclui páginas principais de notícias com funcionalidades de busca e expansão para visualização completa das notícias. Além disso, oferece um sistema de login com diferentes níveis de acesso para diretores/administradores, jornalistas e desenvolvedores.

## Funcionalidades

### Diretor/Administrador
- Excluir funcionários
- Editar perfil de funcionários
- Excluir notícias de funcionários
- Cadastrar funcionários
- Cadastrar notícias

### Jornalista
- Criar notícias
- Excluir notícias
- Editar notícias

### Desenvolvedor
- Aplicação em formato JSON para dados das notícias e jornalistas
- Tela de consulta da API que é salva no arquivo data.json para melhor visualização da JSON no código

## Proteções de Segurança

O sistema inclui várias medidas de proteção para garantir a segurança dos dados e usuários:

- Proteções contra SQL Injection
- Proteções contra XSS (Cross-Site Scripting)
- Senhas criptografadas usando algoritmo de HashPassword, tornando impossível a descriptografia

## Screenshots

![Página Principal de Notícias](link_para_imagem_da_pagina_principal.png)
*Página principal de notícias com funcionalidade de busca e botão para visualização completa.*

![Página de Login](link_para_imagem_da_pagina_de_login.png)
*Página de login para acesso ao sistema com diferentes níveis de permissão.*

## Tecnologias Utilizadas

- Frontend: Bootstrap CSS, JavaScript
- Backend: PHP
- Banco de Dados: SQL

## Como Executar

1. Clone o repositório: `git clone https://github.com/seu-usuario/nome-do-repositorio.git`
2. Configure o ambiente PHP e SQL, se necessário.
3. Importe o banco de dados.
4. Execute o aplicativo em um servidor PHP.

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir um pull request para adicionar novos recursos, corrigir bugs ou melhorar a documentação.

## Licença

[Inserir Licença]

---
Este projeto foi desenvolvido por [Seu Nome]. Para quaisquer dúvidas ou sugestões, entre em contato através do email [seu.email@example.com].
