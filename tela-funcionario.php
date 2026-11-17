<?php // tela-funcionario.php: a VISÃO da área do funcionário. Só o HTML ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#101b35">
  <title>Funcionário · MiniLoja</title>
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
    }

    * { box-sizing: border-box; }
    body { min-height: 100vh; margin: 0; background: var(--paper); color: var(--ink); font-family: Inter, "Segoe UI", Arial, sans-serif; -webkit-font-smoothing: antialiased; }
    a { color: var(--blue); text-decoration: none; }
    a:hover { color: #2e49bd; }
    .site-header { min-height: 76px; display: flex; align-items: center; justify-content: space-between; padding: 14px max(6vw, 24px); background: var(--navy); color: var(--white); }
    .brand { display: inline-flex; align-items: center; gap: 11px; color: var(--white); font-weight: 800; letter-spacing: -.03em; }
    .brand:hover { color: var(--white); }
    .brand-mark { display: grid; width: 36px; height: 36px; place-items: center; border-radius: 12px; background: var(--cyan); color: var(--navy); font-size: 1.2rem; }
    .header-link { color: #d7deee; font-size: .9rem; font-weight: 650; }
    .header-link:hover { color: var(--cyan); }
    main { width: min(100% - 40px, 760px); margin: 54px auto 70px; }
    .page-intro { margin-bottom: 28px; }
    .eyebrow { margin: 0 0 9px; color: #5269d8; font-size: .76rem; font-weight: 800; letter-spacing: .13em; text-transform: uppercase; }
    h1, h2 { letter-spacing: -.04em; }
    h1 { margin: 0; font-size: clamp(2rem, 5vw, 3rem); }
    h2 { margin: 0 0 20px; font-size: 1.35rem; }
    .subheading { margin: 10px 0 0; color: var(--muted); line-height: 1.6; }
    .panel { margin-bottom: 20px; padding: clamp(23px, 5vw, 38px); border: 1px solid var(--line); border-radius: 20px; background: var(--white); box-shadow: 0 12px 35px rgba(23, 35, 60, .05); }
    form { display: grid; gap: 17px; }
    .field { display: flex; flex-direction: column; gap: 8px; }
    label { color: #34425c; font-size: .9rem; font-weight: 700; }
    input { width: 100%; min-height: 47px; padding: 11px 13px; border: 1px solid #d6deea; border-radius: 10px; outline: none; background: #fff; color: var(--ink); font: inherit; transition: border-color .18s ease, box-shadow .18s ease; }
    input:focus { border-color: var(--blue); box-shadow: 0 0 0 3px rgba(66, 99, 235, .12); }
    button { min-height: 45px; display: inline-flex; align-items: center; justify-content: center; justify-self: start; padding: 0 20px; border: 0; border-radius: 10px; background: var(--blue); color: #fff; font: inherit; font-size: .9rem; font-weight: 750; cursor: pointer; transition: transform .18s ease, background .18s ease; }
    button:hover { transform: translateY(-1px); background: #334fc9; }
    .notice { margin: 0 0 18px; padding: 14px 16px; border-radius: 12px; line-height: 1.5; }
    .notice-error { background: #fff0f0; color: #b42338; }
    .notice-success { background: #e9f8f2; color: #15714f; }
    .account-panel { display: flex; align-items: center; justify-content: space-between; gap: 18px; }
    .account-panel p { margin: 0; color: var(--muted); line-height: 1.6; }
    .account-panel strong { color: var(--ink); }
    .account-actions { display: flex; flex-wrap: wrap; gap: 10px; }
    .account-actions a { display: inline-flex; min-height: 40px; align-items: center; padding: 0 14px; border-radius: 9px; background: #eef2ff; font-size: .86rem; font-weight: 700; }
    .account-actions a:last-child { background: #f1f3f7; color: #47546b; }
    @media (max-width: 600px) {
      .site-header { min-height: 66px; padding: 14px 20px; }
      main { width: min(100% - 28px, 760px); margin: 30px auto 48px; }
      .account-panel { align-items: flex-start; flex-direction: column; }
    }
  </style>
</head>
<body>
  <header class="site-header">
    <a class="brand" href="index.html"><span class="brand-mark">⌘</span> MiniLoja</a>
    <a class="header-link" href="cadastro.php">Ver produtos →</a>
  </header>
  <main>
  <section class="page-intro">
    <p class="eyebrow">Acesso administrativo</p>
    <h1>Área do funcionário</h1>
    <p class="subheading">Entre para cuidar dos produtos e da equipe da MiniLoja.</p>
  </section>

  <?php if ($erro): ?>
    <p class="notice notice-error"><strong>Não deu:</strong> <?= htmlspecialchars($erro) ?></p>
  <?php endif; ?>
  <?php if ($aviso): ?>
    <p class="notice notice-success"><?= htmlspecialchars($aviso) ?></p>
  <?php endif; ?>

  <!-- já entrou? mostra quem é e o botão de sair -->
  <?php if ($logado): ?>
    <section class="panel account-panel">
      <p>Você está conectado como <strong><?= htmlspecialchars($logado) ?></strong>.</p>
      <nav class="account-actions" aria-label="Ações da conta">
        <a href="cadastro.php">Gerenciar produtos</a>
        <a href="funcionario.php?sair=1">Sair</a>
      </nav>
    </section>
  <?php else: ?>
    <section class="panel">
    <h2>Entrar na sua conta</h2>
    <form method="post" action="funcionario.php">
      <input type="hidden" name="acao" value="entrar">

      <div class="field">
        <label for="email-entrar">E-mail</label>
        <input id="email-entrar" name="email" type="email" autocomplete="username" required placeholder="voce@exemplo.com">
      </div>
      <div class="field">
        <label for="senha-entrar">Senha</label>
        <input id="senha-entrar" name="senha" type="password" autocomplete="current-password" required placeholder="Sua senha">
      </div>

      <button type="submit">Entrar</button>
    </form>
    </section>
  <?php endif; ?>

  <!-- NOVO: o formulário de cadastro só aparece para quem pode usar -->
  <?php if ($podeCadastrar): ?>
  <section class="panel">
  <h2><?= $logado ? 'Cadastrar funcionário' : 'Primeiro acesso' ?></h2>
  <?php if (!$logado): ?>
    <p class="subheading">Cadastre a conta que administrará os produtos da loja.</p>
  <?php endif; ?>
  <form method="post" action="funcionario.php">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="field">
      <label for="nome">Nome</label>
      <input id="nome" name="nome" autocomplete="name" required placeholder="Seu nome">
    </div>
    <div class="field">
      <label for="email">E-mail</label>
      <input id="email" name="email" type="email" autocomplete="email" required placeholder="voce@exemplo.com">
    </div>
    <div class="field">
      <label for="senha">Senha (8 caracteres ou mais)</label>
      <input id="senha" name="senha" type="password" autocomplete="new-password" minlength="8" required placeholder="Crie uma senha">
    </div>

    <button type="submit">Cadastrar</button>
  </form>
  </section>
  <?php endif; ?>
  </main>
</body>
</html>
