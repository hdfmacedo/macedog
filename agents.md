# ?? `agents.md` ? Guia para Agentes Humanos e de Inteligência Artificial

## ?? Visão Geral

Este sistema é um **painel pessoal de produtividade** feito em **PHP puro**, com banco de dados **SQL Server**, com foco em:

- ? **Mini-tarefas** (com datas, prioridade, status e interessados internos)
- ?? **Links úteis** (com título e agrupamento por categoria)
- ?? **Anotações/ideias** (com suporte a Markdown)
- ?? Organização via **tópicos e pastas** (lógicas, no banco de dados)

Esse sistema será **usado por apenas uma pessoa** e evoluído com apoio de **IAs (como Copilot, Codex)**, portanto a clareza de código, **boas práticas de separação de responsabilidades** e **simplicidade de arquitetura** são fundamentais.

---

## ??? Arquitetura do Projeto

### ?? Estilo: DDD Simplificado + MVC

- **Controllers**: lógica de requisições HTTP
- **Models (Domain)**: manipulação dos dados, acesso ao banco (via repositórios)
- **Views**: HTML/CSS puro (com suporte darkmode)
- **Services (opcional)**: regras de negócio centralizadas
- **Repositories**: SQL Server + PDO para acesso a dados

**Padrões técnicos usados**:
- PHP >= 8.0
- PSR-4 Autoloading
- Namespaces limpos e claros (`App\Controllers`, `App\Models`, etc)
- Sem frameworks (PHP puro)

---

## ?? Autenticação

Sistema com uma **senha única (por enquanto, "admin")**, protegendo todo o conteúdo.

```php
// IA: Substituir esse método por autenticação com hash/sessão em etapas futuras
```

---

## ?? Entidades Principais

### 1. `tarefas`
- `id`, `titulo`, `descricao`, `vencimento`, `prioridade`, `status`, `topico_id`, `pasta_id`
- `interessados`: tabela auxiliar com referências a `pessoas`

### 2. `links`
- `id`, `titulo`, `url`, `categoria`, `topico_id`, `pasta_id`

### 3. `anotacoes`
- `id`, `titulo`, `conteudo_markdown`, `topico_id`, `pasta_id`

### 4. `topicos`
- `id`, `nome`, `descricao`

### 5. `pastas`
- `id`, `nome`

### 6. `pessoas`
- `id`, `nome`, `departamento`, `email` *(opcional)*

---

## ?? Convenções para a I.A.

### ?? Comentários especiais

Use marcações como:

```php
// IA: Este método pode ser generalizado no futuro
// IA: Validar se topico_id é obrigatório antes de salvar
```

### ?? Melhorias por commit

Ao gerar código, sempre sugerir nos comentários possíveis refatorações:

```php
// IA: Sugestão futura ? extrair lógica de prioridade para um Service
```

---

## ?? Interface

- HTML + CSS puro, com darkmode nativo (sem alternância)
- Layout focado em **resolução desktop**
- Javascript puro para interação básica (ex: mostrar/ocultar, marcar concluído)

---

## ?? Estrutura de Pastas

```
/app
  /Controllers
  /Models
  /Repositories
  /Views
  /Services
/public
  index.php
  /assets
/config
  database.php
/routes
  web.php
/storage
  /logs
vendor/
```

---

## ?? Banco de Dados

- Usar **SQL Server** com PDO.
- Scripts versionados manualmente em `/migrations/`, nomeados por data.

```sql
-- 2025_07_17_create_tarefas.sql
CREATE TABLE tarefas (
  id INT PRIMARY KEY IDENTITY,
  titulo NVARCHAR(255),
  ...
);
```

---

## ?? Segurança e Validações

- Sanitização de inputs manual (ex: `htmlspecialchars`, `trim`)
- Proteção mínima por sessão e senha
- Sem cookies de terceiros

---

## ?? Evolução Esperada

- Por enquanto, o sistema é **uso exclusivo**.
- Nenhum suporte a API externa, múltiplos usuários, compartilhamento ou exportação.
- Futuras expansões devem manter a simplicidade, seguindo essa estrutura.

---

## ?? Notas para futuros desenvolvedores / IAs

- Sempre comece estudando os Controllers e Models da funcionalidade em questão.
- Tente manter cada funcionalidade isolada, com seus próprios arquivos.
- Evite acoplamento entre entidades fora dos `Models` ou `Services`.
- Nomeie tudo de forma clara (sem abreviações confusas).
- Use inglês no código, português nas views se necessário.