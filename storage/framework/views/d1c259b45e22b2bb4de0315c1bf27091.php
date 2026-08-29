<?php $__env->startSection('title','Expertises — Administration'); ?>
<?php $__env->startSection('header_title','Gestion des expertises'); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-page">
  <div class="admin-page-head">
    <div><div class="admin-eyebrow">Catalogue</div><h1>Expertises</h1><p>Gérez les 20 domaines affichés sur le site : texte, image, ordre et publication.</p></div>
    <a href="<?php echo e(route('services')); ?>" target="_blank" class="admin-btn admin-btn-dark">Voir la page publique ↗</a>
  </div>

  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
    <div class="mb-5 rounded-2xl border border-red-100 bg-red-50 p-4 text-sm font-bold text-red-700">
      <div class="mb-1">Impossible d'enregistrer les modifications.</div>
      <ul class="list-disc pl-5 font-medium"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?><li><?php echo e($error); ?></li><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?></ul>
    </div>
  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

  <div class="admin-grid-2">
    <section class="admin-card admin-card-dark">
      <div class="admin-card-kicker">Nouvelle fiche</div>
      <h2 class="mt-2 text-2xl font-extrabold">Ajouter une expertise</h2>
      <p class="admin-muted-dark mt-2">Ajoutez le texte puis choisissez directement une image depuis votre ordinateur.</p>
      <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('admin.services.store')); ?>" class="admin-form mt-6">
        <?php echo csrf_field(); ?>
        <div class="admin-field"><label>Nom de l'expertise</label><input name="title" required placeholder="Ex. Études et recherches"></div>
        <div class="admin-field"><label>Résumé</label><textarea name="short_description" rows="3" required></textarea></div>
        <div class="admin-field"><label>Description complète</label><textarea name="description" rows="5"></textarea></div>
        <div class="admin-field"><label>Image</label><input type="file" name="image_upload" accept="image/jpeg,image/png,image/webp" onchange="previewFile(this,'new-preview')"><small>JPG, PNG ou WebP · 12 Mo maximum.</small><div id="new-preview" class="mt-3 hidden overflow-hidden rounded-xl border border-white/10"><img class="h-40 w-full object-cover" alt="Aperçu"></div></div>
        <div class="admin-form-grid"><div class="admin-field"><label>Style</label><select name="accent"><option value="green">Vert</option><option value="orange">Orange</option></select></div><div class="admin-field"><label>Ordre</label><input name="sort_order" type="number" value="1" min="0"></div></div>
        <label class="admin-check"><input type="checkbox" name="is_active" value="1" checked> Publier immédiatement</label>
        <button class="admin-btn admin-btn-orange w-full">Ajouter l'expertise</button>
      </form>
    </section>

    <section class="space-y-4">
      <div class="admin-card flex items-center justify-between gap-4">
        <div><div class="admin-card-kicker">Contenu existant</div><h2 class="mt-1 text-xl font-extrabold"><?php echo e($items->count()); ?> expertise(s)</h2><p class="mt-1 text-xs text-slate-500">Cliquez sur une fiche pour la modifier.</p></div>
        <div class="rounded-2xl bg-green-50 px-4 py-3 text-center"><div class="text-xl font-black text-green-800"><?php echo e($items->where('is_active',true)->count()); ?></div><div class="text-[9px] font-black uppercase tracking-wider text-green-700">publiées</div></div>
      </div>

      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
      <details class="group rounded-3xl border border-slate-200 bg-white shadow-sm" <?php if(request('edit') == $service->id): ?> open <?php endif; ?>>
        <summary class="flex cursor-pointer list-none items-center gap-4 p-5">
          <div class="h-16 w-20 shrink-0 overflow-hidden rounded-2xl bg-slate-100">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->image): ?><img src="<?php echo e(asset($service->image)); ?>" class="h-full w-full object-cover" alt=""><?php else: ?><div class="flex h-full items-center justify-center text-[10px] font-bold text-slate-400">Aucune image</div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          </div>
          <div class="min-w-0 flex-1"><div class="text-[9px] font-black uppercase tracking-wider text-slate-400"><?php echo e(str_pad($i+1,2,'0',STR_PAD_LEFT)); ?> · ordre <?php echo e($service->sort_order); ?></div><div class="truncate text-base font-extrabold text-slate-900"><?php echo e($service->title); ?></div><div class="mt-1 truncate text-xs text-slate-500"><?php echo e($service->short_description); ?></div></div>
          <span class="rounded-full px-3 py-1 text-[9px] font-black <?php echo e($service->is_active ? 'bg-green-50 text-green-700' : 'bg-slate-100 text-slate-500'); ?>"><?php echo e($service->is_active ? 'PUBLIÉE' : 'MASQUÉE'); ?></span>
          <span class="text-slate-300 transition group-open:rotate-180">⌄</span>
        </summary>
        <div class="border-t border-slate-100 p-5 lg:p-6">
          <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('admin.services.update',$service)); ?>" class="admin-form">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="admin-form-grid"><div class="admin-field"><label>Nom</label><input name="title" value="<?php echo e($service->title); ?>" required></div><div class="admin-field"><label>Ordre</label><input name="sort_order" type="number" min="0" value="<?php echo e($service->sort_order); ?>" required></div></div>
            <div class="admin-field"><label>Résumé</label><textarea name="short_description" rows="3" required><?php echo e($service->short_description); ?></textarea></div>
            <div class="admin-field"><label>Description complète</label><textarea name="description" rows="5"><?php echo e($service->description); ?></textarea></div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
              <div class="grid gap-5 lg:grid-cols-[180px_1fr] lg:items-center">
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->image): ?><img src="<?php echo e(asset($service->image)); ?>" id="preview-<?php echo e($service->id); ?>" class="h-32 w-full object-cover" alt="<?php echo e($service->title); ?>"><?php else: ?><div id="preview-<?php echo e($service->id); ?>" class="flex h-32 items-center justify-center text-xs text-slate-400">Aucune image</div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="admin-field"><label>Remplacer l'image</label><input type="file" name="image_upload" accept="image/jpeg,image/png,image/webp" onchange="previewFile(this,'preview-<?php echo e($service->id); ?>')"><small>Le fichier sélectionné sera enregistré et utilisé automatiquement sur le site. Pas besoin de modifier le code.</small><div class="mt-2 rounded-xl bg-white px-3 py-2 text-[10px] text-slate-500">Image actuelle : <strong><?php echo e($service->image ?: 'aucune'); ?></strong></div></div>
              </div>
            </div>
            <div class="admin-form-grid"><div class="admin-field"><label>Accent</label><select name="accent"><option value="green" <?php if($service->accent==='green'): echo 'selected'; endif; ?>>Vert</option><option value="orange" <?php if($service->accent==='orange'): echo 'selected'; endif; ?>>Orange</option></select></div><div></div></div>
            <div class="flex flex-wrap items-center gap-3"><label class="admin-check"><input type="checkbox" name="is_active" value="1" <?php if($service->is_active): echo 'checked'; endif; ?>> Afficher sur le site</label><button class="admin-btn admin-btn-green ml-auto">Enregistrer les modifications</button></div>
          </form>
          <div class="mt-4 border-t border-slate-100 pt-4"><form method="POST" action="<?php echo e(route('admin.services.delete',$service)); ?>" onsubmit="return confirm('Supprimer cette expertise ?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="admin-danger">Supprimer cette expertise</button></form></div>
        </div>
      </details>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </section>
  </div>
</div>
<script>
function previewFile(input,id){const box=document.getElementById(id);if(!input.files||!input.files[0])return;const url=URL.createObjectURL(input.files[0]);if(box.tagName==='IMG'){box.src=url;}else{box.innerHTML='<img class="h-32 w-full object-cover" alt="Aperçu">';box=box.querySelector('img');box.src=url;}box.parentElement?.classList?.remove('hidden');}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\orogna-consulting-pro-v10-premium-2026-backoffice-pro\orogna-v10-work\resources\views/admin/content/services.blade.php ENDPATH**/ ?>