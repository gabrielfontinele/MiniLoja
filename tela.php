<?php // tela.php: a VISÃO. Só o HTML; as variáveis vêm do cadastro.php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#101b35">
  <title>Produtos · MiniLoja</title>
  <style>
    :root {
      color-scheme: light;
      --ink: #17233c;
      --muted: #68758d;
      --navy: #101b35;
      --blue: #4263eb;
      --cyan: #66e0d0;
      --paper: #f4f7fb;
      --line: #e4e9f1;
      --white: #fff;
      --danger: #b42338;
    }

    * { box-sizing: border-box; }
    body {
      min-height: 100vh;
      margin: 0;
      background: var(--paper);
      color: var(--ink);
      font-family: Inter, "Segoe UI", Arial, sans-serif;
      -webkit-font-smoothing: antialiased;
    }
    a { color: var(--blue); text-decoration: none; }
    a:hover { color: #2e49bd; }
    .site-header {
      min-height: 76px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      padding: 14px max(6vw, 24px);
      background: var(--navy);
      color: var(--white);
    }
    .brand { display: inline-flex; align-items: center; gap: 11px; color: var(--white); font-weight: 800; letter-spacing: -.03em; }
    .brand:hover { color: var(--white); }
    .brand-mark { display: grid; width: 36px; height: 36px; place-items: center; border-radius: 12px; background: var(--cyan); color: var(--navy); font-size: 1.2rem; }
    .header-links { display: flex; flex-wrap: wrap; align-items: center; justify-content: flex-end; gap: 18px; color: #d7deee; font-size: .9rem; }
    .header-links a { color: inherit; }
    .header-links a:hover { color: var(--cyan); }
    main { width: min(1120px, calc(100% - 40px)); margin: 42px auto 70px; }
    .intro { margin-bottom: 30px; }
    .eyebrow { margin: 0 0 9px; color: #5269d8; font-size: .76rem; font-weight: 800; letter-spacing: .13em; text-transform: uppercase; }
    h1, h2 { letter-spacing: -.04em; }
    h1 { margin: 0; font-size: clamp(2rem, 4vw, 3rem); }
    h2 { margin: 0 0 20px; font-size: 1.35rem; }
    .welcome { margin: 10px 0 0; color: var(--muted); line-height: 1.6; }
    .panel { margin: 0 0 36px; padding: clamp(22px, 4vw, 34px); border: 1px solid var(--line); border-radius: 20px; background: var(--white); box-shadow: 0 12px 35px rgba(23, 35, 60, .045); }
    .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
    .field { display: flex; flex-direction: column; gap: 8px; }
    .field-wide { grid-column: 1 / -1; }
    label { color: #34425c; font-size: .9rem; font-weight: 700; }
    input:not([type="hidden"]) { width: 100%; min-height: 46px; padding: 11px 13px; border: 1px solid #d6deea; border-radius: 10px; outline: none; background: #fff; color: var(--ink); font: inherit; transition: border-color .18s ease, box-shadow .18s ease; }
    input:focus { border-color: var(--blue); box-shadow: 0 0 0 3px rgba(66, 99, 235, .12); }
    input[type="file"] { padding: 8px; color: var(--muted); font-size: .86rem; }
    small { color: var(--muted); font-size: .82rem; }
    .current-photo { width: 76px; height: 76px; object-fit: cover; border: 1px solid var(--line); border-radius: 12px; }
    .form-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 14px; margin-top: 21px; }
    button, .button {
      min-height: 42px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 0 17px;
      border: 0;
      border-radius: 10px;
      background: var(--blue);
      color: #fff;
      font: inherit;
      font-size: .88rem;
      font-weight: 750;
      cursor: pointer;
      transition: background .18s ease, transform .18s ease;
    }
    button:hover, .button:hover { transform: translateY(-1px); background: #334fc9; color: #fff; }
    .notice { margin: 0 0 24px; padding: 14px 16px; border-radius: 12px; background: #fff0f0; color: var(--danger); line-height: 1.5; }
    .product-heading { display: flex; align-items: baseline; justify-content: space-between; gap: 16px; margin-bottom: 18px; }
    .product-heading h2 { margin: 0; }
    .count { color: var(--muted); font-size: .88rem; }
    .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(230px, 1fr)); gap: 18px; margin: 0; padding: 0; list-style: none; }
    .product-card { min-width: 0; overflow: hidden; display: flex; flex-direction: column; padding: 12px; border: 1px solid var(--line); border-radius: 17px; background: var(--white); box-shadow: 0 8px 26px rgba(23, 35, 60, .045); transition: transform .2s ease, box-shadow .2s ease; }
    .product-card:hover { transform: translateY(-3px); box-shadow: 0 16px 35px rgba(23, 35, 60, .1); }
    .product-image { width: 100%; height: 170px; display: grid; place-items: center; border-radius: 11px; background: #f0f3f9; color: var(--muted); font-size: .9rem; object-fit: cover; }
    .product-info { padding: 16px 5px 12px; }
    .product-name { min-height: 2.8em; margin: 0 0 8px; font-size: 1.02rem; font-weight: 750; line-height: 1.4; }
    .product-price { margin: 0; color: #25385e; font-size: 1.15rem; font-weight: 800; }
    .product-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 9px; margin-top: auto; padding: 0 5px 5px; }
    .product-actions a { font-size: .85rem; font-weight: 700; }
    .product-actions form { margin: 0; }
    .product-actions button { min-height: 34px; padding: 0 12px; background: #fff0f0; color: var(--danger); font-size: .8rem; }
    .product-actions button:hover { background: #ffe0e2; }
    .empty-state { padding: 28px; border: 1px dashed #cbd4e2; border-radius: 16px; color: var(--muted); text-align: center; }
    @media (max-width: 640px) {
      .site-header { align-items: flex-start; flex-direction: column; padding: 14px 20px; }
      .header-links { justify-content: flex-start; gap: 14px; font-size: .84rem; }
      main { width: min(100% - 28px, 1120px); margin: 28px auto 48px; }
      .form-grid { grid-template-columns: 1fr; }
      .field-wide { grid-column: auto; }
      .product-grid { grid-template-columns: repeat(auto-fill, minmax(155px, 1fr)); gap: 12px; }
      .product-image { height: 135px; }
      .product-card { padding: 9px; }
      .product-info { padding: 12px 3px 9px; }
      .product-actions { padding: 0 3px 3px; }
    }
  </style>
</head>
<body>
  <header class="site-header">
    <a class="brand" href="index.html"><span class="brand-mark">⌘</span> MiniLoja</a>
    <nav class="header-links" aria-label="Navegação principal">
      <a href="index.html">← Início</a>
      <?php if ($logado): ?>
        <a href="funcionario.php">Área do funcionário</a>
        <a href="funcionario.php?sair=1">Sair</a>
      <?php else: ?>
        <a href="funcionario.php">Acesso do funcionário</a>
      <?php endif; ?>
    </nav>
  </header>
  <main>
  <section class="intro">
    <p class="eyebrow">Tecnologia para suas ideias</p>
    <h1>Produtos</h1>

  <!-- NOVO: quem está logado vê o próprio nome; o visitante vê o caminho para entrar -->
  <?php if ($logado): ?>
    <p class="welcome">Olá, <strong><?= htmlspecialchars($logado) ?></strong>! Gerencie o catálogo da loja abaixo.</p>
  <?php else: ?>
    <p class="welcome">Encontre componentes para o seu próximo projeto. É funcionário? <a href="funcionario.php">Entre para cadastrar produtos.</a></p>
  <?php endif; ?>
  </section>

  <!-- NOVO: o formulário só aparece para o funcionário logado -->
  <?php if ($logado): ?>

  <section class="panel">
  <h2><?= !empty($produto['id']) ? 'Editar produto' : 'Adicionar produto' ?></h2>

  <?php if ($erro): ?>
    <p class="notice"><strong>Foto recusada:</strong> <?= htmlspecialchars($erro) ?></p>
  <?php endif; ?>
  <!-- sem o enctype, o arquivo não viaja (chega só o nome dele) -->
  <form method="post" action="cadastro.php" enctype="multipart/form-data">
    <!-- o id escondido diz ao controle qual produto editar (vazio = produto novo) -->
    <input type="hidden" name="id" value="<?= $produto['id'] ?? '' ?>">

    <div class="form-grid">
      <div class="field">
        <label for="nome">Nome do produto</label>
        <input id="nome" name="nome" required value="<?= htmlspecialchars($produto['nome'] ?? '') ?>" placeholder="Ex.: Placa ESP32">
      </div>
      <div class="field">
        <label for="preco">Preço (R$)</label>
        <input id="preco" name="preco" type="number" step="0.01" min="0" required value="<?= $produto['preco'] ?? '' ?>" placeholder="0,00">
      </div>

    <?php if (!empty($produto['imagem'])): ?>
      <div class="field field-wide">
        <label>Foto atual</label>
        <img class="current-photo" src="uploads/<?= htmlspecialchars($produto['imagem']) ?>" alt="Foto atual do produto">
      </div>
    <?php endif; ?>

      <div class="field field-wide">
        <label for="imagem"><?= !empty($produto['id']) ? 'Trocar a foto (opcional)' : 'Foto do produto (opcional)' ?></label>
        <input id="imagem" name="imagem" type="file" accept="image/jpeg, image/png, image/webp">
        <small>JPG, PNG ou WEBP, até 2 MB.</small>
      </div>
    </div>

    <div class="form-actions">
    <button type="submit"><?= !empty($produto['id']) ? 'Salvar alterações' : 'Cadastrar' ?></button>
    <?php if (!empty($produto['id'])): ?>
      <a href="cadastro.php">Cancelar</a>
    <?php endif; ?>
    </div>
  </form>
  </section>
  <?php endif; ?>

  <section>
  <div class="product-heading">
    <h2>Catálogo</h2>
    <span class="count"><?= count($produtos) ?> <?= count($produtos) === 1 ? 'produto' : 'produtos' ?></span>
  </div>
  <?php if ($produtos): ?>
  <ul class="product-grid">
    <?php foreach ($produtos as $item): ?>
      <li class="product-card">
        <?php if ($item['imagem']): ?>
          <img class="product-image" src="uploads/<?= htmlspecialchars($item['imagem']) ?>" alt="<?= htmlspecialchars($item['nome']) ?>">
        <?php else: ?>
          <div class="product-image" aria-label="Produto sem foto">📦 <span>&nbsp;Imagem não disponível</span></div>
        <?php endif; ?>
        <div class="product-info">
          <p class="product-name"><?= htmlspecialchars($item['nome']) ?></p>
          <p class="product-price">R$ <?= number_format($item['preco'], 2, ',', '.') ?></p>
        </div>
        <?php if ($logado): ?>
          <div class="product-actions">
          <a href="cadastro.php?editar=<?= $item['id'] ?>">Editar</a>
          <form method="post" action="cadastro.php">
            <button name="excluir" value="<?= $item['id'] ?>">Excluir</button>
          </form>
          </div>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    <p class="empty-state">Ainda não há produtos cadastrados.</p>
  <?php endif; ?>
  </section>
  </main>
</body>
</html>
