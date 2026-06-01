<?php
$projects = json_decode(file_get_contents(__DIR__ . '/projects.json'), true) ?: [];
?>
<!doctype html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Portfolio - Web Tasarım, Düzenleme & Geliştirme</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="site-header">
		<div class="container">
			<h1 class="logo">Portfoliom</h1>
			<nav>
				<a href="#projects">Projeler</a>
				<a href="#about">Hakkımda</a>
				<a href="#contact">İletişim</a>
			</nav>
		</div>
	</header>

	<main class="container">
		<section class="hero">
			<h2>Web Tasarım & Geliştirme</h2>
			<p>Web tasarım, düzenleme ve geliştirme alanındaki çalışmalarımı aşağıda bulabilirsiniz. Her projeye tıklayarak ayrıntılara ulaşabilirsiniz.</p>
			<div class="about-mini">
				<strong>Hakkımda:</strong>
				<p>Web tasarımı ve kodlama eğitimi alıyorum. Web sayfalarını tasarlıyor, düzenliyor ve geliştiriyorum; temiz, erişilebilir ve duyarlı çözümler üretmeye odaklanıyorum.</p>
			</div>
		</section>

		<section id="projects">
			<h2>Projeler</h2>
			<div class="grid">
				<?php foreach ($projects as $i => $p): ?>
					<article class="card">
						<img src="<?=htmlspecialchars($p['image'])?>" alt="<?=htmlspecialchars($p['title'])?>">
						<div class="card-body">
							<h3><?=htmlspecialchars($p['title'])?></h3>
							<p class="excerpt"><?=htmlspecialchars($p['excerpt'] ?? (mb_substr($p['description'], 0, 140) . '...'))?></p>
							<div class="tags">
								<?php foreach (($p['tags'] ?? []) as $t): ?>
									<span class="tag"><?=htmlspecialchars($t)?></span>
								<?php endforeach; ?>
							</div>
							<a class="btn" href="project.php?id=<?=$i?>">Detay</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</section>

		<section id="about">
			<h2>Hakkımda</h2>
			<p>Kısa bir özgeçmiş ya da yetenek açıklaması buraya gelecek. İsterseniz bu metni README.md veya doğrudan bu dosyadan güncelleyebilirsiniz.</p>
		</section>

		<section id="testimonials">
			<h2>Müşteri Yorumları</h2>
			<div class="testimonials">
				<?php
				$testimonials = json_decode(file_get_contents(__DIR__ . '/testimonials.json'), true) ?: [];
				foreach ($testimonials as $t): ?>
					<blockquote class="testimonial">
						<p><?=htmlspecialchars($t['text'])?></p>
						<footer>— <?=htmlspecialchars($t['name'])?> <?php if (isset($t['projectId'])): ?><span class="muted">(Proje: <a href="project.php?id=<?= (int)$t['projectId'] ?>">#<?= (int)$t['projectId'] + 1 ?></a>)</span><?php endif; ?></footer>
					</blockquote>
				<?php endforeach; ?>
			</div>
		</section>

		<section id="contact">
			<h2>İletişim</h2>
			<p>E-posta: <a href="mailto:example@ornek.com">example@ornek.com</a> (burayı kendi e-postanızla değiştirin)</p>
		</section>
	</main>

	<footer class="site-footer">
		<div class="container">© <?=date('Y')?> - Portfolio</div>
	</footer>
</body>
</html>

