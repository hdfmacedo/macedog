# ?? `agents.md` ? Guia para Agentes Humanos e de Intelig�ncia Artificial

## ?? Vis�o Geral

Este sistema � um **painel pessoal de produtividade** feito em **PHP puro**, com banco de dados **SQL Server**, com foco em:

- ? **Mini-tarefas** (com datas, prioridade, status e interessados internos)
- ?? **Links �teis** (com t�tulo e agrupamento por categoria)
- ?? **Anota��es/ideias** (com suporte a Markdown)
- ?? Organiza��o via **t�picos e pastas** (l�gicas, no banco de dados)

Esse sistema ser� **usado por apenas uma pessoa** e evolu�do com apoio de **IAs (como Copilot, Codex)**, portanto a clareza de c�digo, **boas pr�ticas de separa��o de responsabilidades** e **simplicidade de arquitetura** s�o fundamentais.

---

## ??? Arquitetura do Projeto

### ?? Estilo: DDD Simplificado + MVC

- **Controllers**: l�gica de requisi��es HTTP
- **Models (Domain)**: manipula��o dos dados, acesso ao banco (via reposit�rios)
- **Views**: HTML/CSS puro (com suporte darkmode)
- **Services (opcional)**: regras de neg�cio centralizadas
- **Repositories**: SQL Server + PDO para acesso a dados

**Padr�es t�cnicos usados**:
- PHP >= 8.0
- PSR-4 Autoloading
- Namespaces limpos e claros (`App\Controllers`, `App\Models`, etc)
- Sem frameworks (PHP puro)

---

## ?? Autentica��o

Sistema com uma **senha �nica (por enquanto, "admin")**, protegendo todo o conte�do.

```php
// IA: Substituir esse m�todo por autentica��o com hash/sess�o em etapas futuras
```

---

## ?? Entidades Principais

### 1. `tarefas`
- `id`, `titulo`, `descricao`, `vencimento`, `prioridade`, `status`, `topico_id`, `pasta_id`
- `interessados`: tabela auxiliar com refer�ncias a `pessoas`

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

## ?? Conven��es para a I.A.

### ?? Coment�rios especiais

Use marca��es como:

```php
// IA: Este m�todo pode ser generalizado no futuro
// IA: Validar se topico_id � obrigat�rio antes de salvar
```

### ?? Melhorias por commit

Ao gerar c�digo, sempre sugerir nos coment�rios poss�veis refatora��es:

```php
// IA: Sugest�o futura ? extrair l�gica de prioridade para um Service
```

---

## ?? Interface

- HTML + CSS puro, com darkmode nativo (sem altern�ncia)
- Layout focado em **resolu��o desktop**
- Javascript puro para intera��o b�sica (ex: mostrar/ocultar, marcar conclu�do)

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

## ?? Seguran�a e Valida��es

- Sanitiza��o de inputs manual (ex: `htmlspecialchars`, `trim`)
- Prote��o m�nima por sess�o e senha
- Sem cookies de terceiros

---

## ?? Evolu��o Esperada

- Por enquanto, o sistema � **uso exclusivo**.
- Nenhum suporte a API externa, m�ltiplos usu�rios, compartilhamento ou exporta��o.
- Futuras expans�es devem manter a simplicidade, seguindo essa estrutura.

---

## ?? Notas para futuros desenvolvedores / IAs

- Sempre comece estudando os Controllers e Models da funcionalidade em quest�o.
- Tente manter cada funcionalidade isolada, com seus pr�prios arquivos.
- Evite acoplamento entre entidades fora dos `Models` ou `Services`.
- Nomeie tudo de forma clara (sem abrevia��es confusas).
- Use ingl�s no c�digo, portugu�s nas views se necess�rio.