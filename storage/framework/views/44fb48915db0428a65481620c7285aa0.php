<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $__env->yieldContent('title', 'OROGNA Consulting — Conseil, Talents, Formation & Transformation'); ?></title>
<meta name="description" content="<?php echo $__env->yieldContent('meta_description', \App\Models\SiteSetting::value('tagline','Conseil, talents, formation et transformation.')); ?>">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="<?php echo e(url()->current()); ?>">

<!-- Open Graph / Social Media -->
<meta property="og:locale" content="fr_FR">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $__env->yieldContent('title', 'OROGNA Consulting — Conseil, Talents, Formation & Transformation'); ?>">
<meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', \App\Models\SiteSetting::value('tagline','Conseil, talents, formation et transformation.')); ?>">
<meta property="og:url" content="<?php echo e(url()->current()); ?>">
<meta property="og:site_name" content="OROGNA Consulting">
<meta property="og:image" content="<?php echo e(asset(\App\Models\SiteSetting::value('hero_image', 'images/team-orogna.jpg'))); ?>">

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $__env->yieldContent('title', 'OROGNA Consulting'); ?>">
<meta name="twitter:description" content="<?php echo $__env->yieldContent('meta_description', \App\Models\SiteSetting::value('tagline','Conseil, talents, formation et transformation.')); ?>">
<meta name="twitter:image" content="<?php echo e(asset(\App\Models\SiteSetting::value('hero_image', 'images/team-orogna.jpg'))); ?>">

<link rel="icon" href="<?php echo e(asset(\App\Models\SiteSetting::value('favicon','images/logo-orogna-crop.png'))); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orogna.css')); ?>">

<!-- Schema.org Organization Structured Data (JSON-LD) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "OROGNA Consulting",
  "url": "<?php echo e(url('/')); ?>",
  "logo": "<?php echo e(asset(\App\Models\SiteSetting::value('logo','images/logo-orogna.png'))); ?>",
  "image": "<?php echo e(asset(\App\Models\SiteSetting::value('hero_image','images/team-orogna.jpg'))); ?>",
  "description": "<?php echo e(\App\Models\SiteSetting::value('tagline','Conseil, talents, formation et transformation.')); ?>",
  "telephone": "<?php echo e(\App\Models\SiteSetting::value('phone','+226 25 45 62 45')); ?>",
  "email": "<?php echo e(\App\Models\SiteSetting::value('email','contact@orognaconsulting.com')); ?>",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Ouagadougou",
    "addressCountry": "BF"
  },
  "sameAs": [
    "<?php echo e(\App\Models\SiteSetting::value('facebook_url','https://www.facebook.com/search/top?q=OROGNA%20Consulting')); ?>"
  ]
}
</script>
</head>
<body>
<?php echo $__env->make('components.site-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
<div class="fixed right-5 top-24 z-[70] max-w-sm rounded-2xl border border-green-200 bg-white px-5 py-4 text-sm font-bold text-green-800 shadow-2xl" x-data="{show:true}" x-show="show" x-transition>
<div class="flex gap-3"><span>✓</span><span><?php echo e(session('success')); ?></span><button @click="show=false">×</button></div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
<div class="fixed right-5 top-24 z-[70] max-w-sm rounded-2xl border border-red-200 bg-white px-5 py-4 text-sm font-semibold text-red-700 shadow-2xl"><?php echo e($errors->first()); ?></div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<main><?php echo $__env->yieldContent('content'); ?></main>
<div class="or-social-float" aria-label="Réseaux sociaux">
<a class="or-social whatsapp" href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/','',\App\Models\SiteSetting::value('whatsapp',\App\Models\SiteSetting::value('phone','')))); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 3.5A11.9 11.9 0 0 0 12 0C5.4 0 .1 5.3.1 11.9c0 2.1.6 4.1 1.6 5.9L0 24l6.4-1.7a12 12 0 0 0 5.6 1.4h.1c6.5 0 11.8-5.3 11.8-11.9 0-3.2-1.2-6.1-3.4-8.3ZM12 21.7h-.1a9.8 9.8 0 0 1-5-1.4l-.4-.2-3.8 1 1-3.7-.2-.4a9.8 9.8 0 1 1 8.5 4.7Zm5.4-7.4c-.3-.2-1.7-.8-2-.9-.3-.1-.5-.2-.7.2-.2.3-.8.9-1 1.1-.2.2-.4.2-.7.1-.3-.2-1.2-.4-2.3-1.4-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.7l.5-.6c.2-.2.2-.4.3-.6.1-.2 0-.5 0-.6-.1-.2-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4-.3.3-1.1 1-1.1 2.5s1.1 2.9 1.3 3.1c.2.2 2.1 3.3 5.2 4.6.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.3.1-1.4-.1-.2-.3-.2-.6-.4Z"/></svg></a>
<a class="or-social facebook" href="<?php echo e(\App\Models\SiteSetting::value('facebook_url','https://www.facebook.com/search/top?q=OROGNA%20Consulting')); ?>" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 8h3V4h-3c-3.3 0-5 1.9-5 5v3H6v4h3v8h4v-8h3.5l.5-4H13V9c0-.7.3-1 1-1Z"/></svg></a>
</div>
<footer class="or-footer">
<div class="container-pro">
<div class="or-footer-grid">
<div>
<img src="<?php echo e(asset(\App\Models\SiteSetting::value('favicon','images/logo-orogna-crop.png'))); ?>" class="or-footer-logo" alt="OROGNA Consulting">
<p><?php echo e(\App\Models\SiteSetting::value('tagline')); ?></p>
<a href="<?php echo e(route('contact')); ?>">Parler à un consultant →</a>
</div>
<div>
<h3>Explorer</h3>
<a href="<?php echo e(route('about')); ?>">À propos</a>
<a href="<?php echo e(route('services')); ?>">Expertises</a>
<a href="<?php echo e(route('jobs')); ?>">Opportunités</a>
<a href="<?php echo e(route('trainings.index')); ?>">Formations</a>
<a href="<?php echo e(route('gallery.index')); ?>">Galerie</a>
</div>
<div>
<h3>Candidats</h3>
<a href="<?php echo e(route('apply')); ?>">Déposer un CV</a>
<a href="<?php echo e(route('jobs')); ?>">Voir les offres</a>
<a href="<?php echo e(route('contact')); ?>">Nous écrire</a>
<a href="<?php echo e(route('login')); ?>">Espace candidat</a>
</div>
<div>
<h3>Contact</h3>
<p><?php echo e(\App\Models\SiteSetting::value('address')); ?></p>
<p><?php echo e(\App\Models\SiteSetting::value('phone')); ?></p>
<p><?php echo e(\App\Models\SiteSetting::value('email','contact@orognaconsulting.com')); ?></p>
</div>
</div>
<div class="or-footer-bottom">
<span>© <?php echo e(date('Y')); ?> OROGNA Consulting. Tous droits réservés.</span>
<span>Conseil · Talents · Formation · Transformation</span>
</div>
</div>
</footer>
</body>
</html>
<?php /**PATH /app/resources/views/layouts/app.blade.php ENDPATH**/ ?>