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

## Tecnologias Utilizadas

- Frontend: Bootstrap CSS, JavaScript
- Backend: PHP
- Banco de Dados: SQL

## Screenshots

- *Página principal de notícias com funcionalidade de busca e botão para visualização completa.*
![Página Principal de Notícias](https://github.com/HaarleyDev/Portal-De-Noticia/assets/85031806/b85a3d1e-d705-44ef-8721-2635a2558141)


- *Página de login para acesso ao sistema com diferentes níveis de permissão.*
![Página de Login](https://github.com/HaarleyDev/Portal-De-Noticia/assets/85031806/1c2dc8aa-706b-4aa4-a0bc-6256ab2e6217)


- *Página do jornalista para ter acesso a cadastro e ver suas próprias notícias publicadas.*
![Página de Jornalista](https://github.com/HaarleyDev/Portal-De-Noticia/assets/85031806/7e72c74f-557e-4444-9ec6-c8adadced280)


- *Página do jornalista para ver suas próprias notícias publicadas.*
![Página de Ver Noticia](https://github.com/HaarleyDev/Portal-De-Noticia/assets/85031806/4291ff2f-e372-474a-94a3-362ad27c4311)


- *Página do jornalista para cadastro suas próprias notícias publicadas.*
![Página Cadastrar Noticia](https://github.com/HaarleyDev/Portal-De-Noticia/assets/85031806/0b7c7a50-6e4e-4266-8d8e-eca16aacf2a2)


- *Página do desenvolvedor para verificação das APIS.*
![Página Verificação em JSON](https://github.com/HaarleyDev/Portal-De-Noticia/assets/85031806/888f394b-a105-4ab4-839b-f29948a044e7)


## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir um pull request para adicionar novos recursos, corrigir bugs ou melhorar a documentação.

## Licença

[Distribuído sob a Licença MIT. Veja LICENSE para mais informações.]

---
Este projeto foi desenvolvido por [Haarley]. Para quaisquer dúvidas ou sugestões, entre em contato através do email [guilhermeharley7@gmail.com].
