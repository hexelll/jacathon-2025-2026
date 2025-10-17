<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Profil — Redesigned (sombre)</title>

  <!-- Bootstrap + Icons (inchangés) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <style>
    /* Palette sombre / variables */
    :root{
      --bg-900: #06070a;
      --bg-800: #0b1220;
      --panel: linear-gradient(180deg,#0f1724 0%, #08101b 100%);
      --muted: #9aa4b2;
      --accent: #2b8cff;
      --danger: #ff5b6e;
      --success: #37d67a;
      --card: rgba(255,255,255,0.03);
      --glass: rgba(255,255,255,0.04);
      --text: #e6eef8;
      --sub: #9fb0c6;
      --shadow: rgba(2,6,23,0.7);
    }

    html,body { height: 100%; }
    body {
      margin: 0;
      font-family: Inter, "Segoe UI", Roboto, Arial, sans-serif;
      background: radial-gradient(1200px 600px at 10% 10%, rgba(43,140,255,0.06), transparent 10%),
                  linear-gradient(180deg, var(--bg-900), var(--bg-800));
      color: var(--text);
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
    }

    /* Top controls bar (contacts / browsing) */
    .top-controls {
      width: 100%;
      padding: 18px;
      box-sizing: border-box;
      display:flex;
      gap:12px;
      justify-content: center;
      align-items: center;
      position: absolute;
      top: 18px;
      left: 0;
      z-index: 30;
      pointer-events: auto;
    }
    .top-controls .btn {
      min-width: 180px;
      padding: 14px 28px;
      font-size: 1.15rem;
      border-radius: 999px;
      box-shadow: 0 6px 18px rgba(2,6,23,0.5);
      transition: transform .12s ease, box-shadow .12s ease;
      border: 1px solid rgba(255,255,255,0.04);
      background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      color: var(--text);
    }
    .top-controls .btn:hover { transform: translateY(-3px); box-shadow: 0 14px 36px rgba(2,6,23,0.6); }
    .top-controls .btn:active { transform: translateY(-1px); }

    /* Center card wrapper */
    .center-wrap {
      height: 100vh;
      display: grid;
      place-items: center;
      padding: 80px 16px 32px;
      box-sizing: border-box;
    }

    .profile-card {
      width: min(520px, 94vw);
      border-radius: 16px;
      overflow: hidden;
      background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(0,0,0,0.02));
      border: 1px solid rgba(255,255,255,0.04);
      box-shadow: 0 18px 50px var(--shadow);
      position: relative;
    }

    .profile-media {
      position: relative;
      background: #061018;
      display:flex;
      align-items:center;
      justify-content:center;
      aspect-ratio: 3/4;
      overflow: hidden;
    }
    .profile-media img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display:block;
      transform: scale(1.03);
      filter: saturate(1.02) contrast(1.02);
    }

    /* gradient overlay to ensure text readability */
    .profile-media::after {
      content: "";
      position: absolute;
      left:0; right:0; top:0; bottom:0;
      background: linear-gradient(180deg, rgba(2,6,23,0) 50%, rgba(2,6,23,0.55) 75%, rgba(2,6,23,0.85) 100%);
      pointer-events:none;
    }

    /* Name & badges overlay */
    .profile-info-overlay {
      position: absolute;
      left: 14px;
      bottom: 110px;
      color: var(--text);
      z-index: 3;
      max-width: calc(100% - 32px);
      text-shadow: 0 6px 20px rgba(0,0,0,0.6);
    }
    .profile-info-overlay .name {
      font-size: 1.9rem;
      font-weight: 700;
      line-height: 1;
      margin-bottom: 6px;
    }
    .profile-info-overlay .badges {
      display:flex;
      gap:8px;
      margin-top:6px;
    }
    .profile-badge {
      font-size: 0.78rem;
      padding: 6px 10px;
      border-radius: 999px;
      background: rgba(255,255,255,0.06);
      color: var(--sub);
      border: 1px solid rgba(255,255,255,0.03);
    }
    .hobby-badge {
      font-size: 0.78rem;
      padding: 6px 10px;
      border-radius: 999px;
      background: var(--accent);
      color: var(--text);
      border: 1px solid rgba(255,255,255,0.03);
    }

    /* Body actions */
    .card-actions {
      padding: 18px;
      display:flex;
      justify-content:center;
      gap:22px;
      align-items:center;
      background: linear-gradient(180deg, rgba(255,255,255,0.01), rgba(0,0,0,0.01));
    }
    .action-btn {
      width: 86px;
      height: 86px;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      border-radius: 999px;
      font-size: 1.8rem;
      border: none;
      cursor: pointer;
      transition: transform .12s ease, box-shadow .12s ease, background .12s;
      box-shadow: 0 8px 22px rgba(2,6,23,0.5);
    }
    .action-btn:active { transform: translateY(2px); }

    .btn-reject {
      background: linear-gradient(180deg, rgba(255,35,74,0.08), rgba(255,35,74,0.04));
      color: var(--danger);
      border: 1px solid rgba(255,35,74,0.12);
      font-size: 1.6rem;
    }
    :hover.btn-reject {
      background: var(--danger);
      color: black;
      border: 1px solid rgba(255,35,74,0.12);
      font-size: 1.6rem;
    }
    .btn-like {
      background: linear-gradient(180deg, rgba(45,211,122,0.08), rgba(45,211,122,0.04));
      color: var(--success);
      border: 1px solid rgba(45,211,122,0.12);
      font-size: 1.6rem;
    }
    :hover.btn-like {
      background: var(--success);
      color: black;
      border: 1px solid rgba(45,211,122,0.12);
      font-size: 1.6rem;
    }
    .btn-profile {
      background: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.02));
      color: var(--text);
      border: 1px solid rgba(255,255,255,0.04);
      padding: 10px 18px;
      font-size: 1rem;
      border-radius: 999px;
      display:flex;
      align-items:center;
      gap:10px;
    }

    /* Responsive tweaks */
    @media (max-width: 540px) {
      .top-controls { top: 10px; gap:8px; padding:12px; }
      .top-controls .btn { min-width: 120px; padding: 10px 18px; font-size: 0.95rem; }
      .profile-info-overlay { bottom: 90px; left: 12px; }
      .profile-info-overlay .name { font-size: 1.4rem; }
      .action-btn { width: 68px; height: 68px; font-size: 1.3rem; }
      .card-actions { gap:12px; padding:12px; }
    }
  </style>
</head>
<body>
    <?php
        try {
            $redis = new Redis();
            $redis->connect('redis', 6379);
        } catch (Exception $e) {
            $error = "Erreur connexion Redis : " . $e->getMessage();
        }
        $userId = $_REQUEST["userId"];

        

        $user = $redis->hget("User:".$userId);

        $name = $user["name"];
        $nameUn = $user["nameUn"];

        $roles = $redis->lrange("User:".$userId.":role 0 -1");
        $hobbies = $redis->lrange("User:".$userId.":hobby 0 -1");;
        $pfpPath = $user["logoPath"];
    ?>
  <!-- Top controls (contacts / browsing) -->
  <div class="top-controls" role="navigation">
    <a href="chat.php" class="btn btn-secondary" aria-label="Contacts">contacts</a>
    <a href="tinder.php" class="btn btn-secondary" aria-label="Browsing">browsing</a>
  </div>

  <!-- Centered card -->
  <div class="center-wrap">
    <article class="profile-card shadow-sm" aria-label="Profile card">
      <div class="profile-media">
        <!-- Conserver la source d'image inchangée -->
        <img src="<?php echo $pfpPath; ?>" alt="Photo de profil">
        <!-- Name + badges overlay (texte inchangé) -->
        <div class="profile-info-overlay">
          <div class="name"><?php echo $name; ?></div>
          <div class="badges">
            <span class="profile-badge"><?php echo $nameUn; ?></span>
            <?php
                foreach($roles as $role) {
                    echo '<span class="profile-badge">'.$role.'</span>';
                }
            ?>
          </div>
          <div class="badges">
            <?php
                    foreach($hobbies as $hobby) {
                        echo '<span class="hobby-badge">'.$hobby.'</span>';
                    }
                ?>
            </div>
        </div>
      </div>

      <div class="card-actions">
        <form action="#" method="POST">
            <!-- Boutons circulaires — icônes préservées -->
            <button class="action-btn btn-reject" title="Reject">
            <i class="bi bi-x" aria-hidden="true"></i>
            </button>

            <a href="profile.php" class="btn-profile" title="Voir le profil">
            <!-- texte inchangé "go to profil" converti en lien visuel amélioré (uniquement style) -->
            go to profil
            </a>

            <button class="action-btn btn-like" title="Connect / Add">
            <i class="bi bi-plus" aria-hidden="true"></i>
            </button>
        </form>
      </div>
    </article>
  </div>

  <!-- Bootstrap JS inchangé -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
