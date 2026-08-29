

<?php $__env->startSection('title', 'Offres d’emploi — Administration'); ?>

<?php $__env->startSection('page-title', 'Offres d’emploi'); ?>

<?php $__env->startSection('content'); ?>

    
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-slate-500">
                Gérez les opportunités publiées sur le site.
            </p>

            <h2 class="mt-1 text-3xl font-black text-slate-900">
                Toutes les offres
            </h2>
        </div>

        <a
            href="<?php echo e(route('admin.jobs.create')); ?>"
            class="inline-flex items-center justify-center rounded-full bg-green-700 px-6 py-3 font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-green-800"
        >
            + Nouvelle offre
        </a>

    </div>


    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>

        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-800">
            <?php echo e(session('success')); ?>

        </div>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


    
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                            Offre
                        </th>

                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                            Référence
                        </th>

                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                            Lieu
                        </th>

                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                            Statut
                        </th>

                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                            Date
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-5">

                                <div class="font-bold text-slate-900">
                                    <?php echo e($offer->title); ?>

                                </div>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($offer->sector): ?>

                                    <div class="mt-1 text-xs text-slate-500">
                                        <?php echo e($offer->sector); ?>

                                    </div>

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            </td>


                            <td class="px-6 py-5">

                                <span class="rounded-lg bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
                                    <?php echo e($offer->reference); ?>

                                </span>

                            </td>


                            <td class="px-6 py-5 text-sm text-slate-600">
                                <?php echo e($offer->location); ?>

                            </td>


                            <td class="px-6 py-5">

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($offer->is_published): ?>

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                                        Publiée
                                    </span>

                                <?php else: ?>

                                    <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">
                                        Brouillon
                                    </span>

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            </td>


                            <td class="px-6 py-5 text-sm text-slate-500">

                                <?php echo e($offer->created_at->format('d/m/Y')); ?>


                            </td>


                            <td class="px-6 py-5">

                                <div class="flex items-center justify-end gap-2">

                                    <a
                                        href="<?php echo e(route('admin.jobs.show', $offer)); ?>"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-100"
                                    >
                                        Voir
                                    </a>

                                    <a
                                        href="<?php echo e(route('admin.jobs.edit', $offer)); ?>"
                                        class="rounded-lg border border-blue-200 px-3 py-2 text-sm font-semibold text-blue-700 hover:bg-blue-50"
                                    >
                                        Modifier
                                    </a>

                                    <form
                                        method="POST"
                                        action="<?php echo e(route('admin.jobs.destroy', $offer)); ?>"
                                        onsubmit="return confirm('Voulez-vous vraiment supprimer cette offre ?')"
                                    >

                                        <?php echo csrf_field(); ?>

                                        <?php echo method_field('DELETE'); ?>

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-200 px-3 py-2 text-sm font-semibold text-red-600 hover:bg-red-50"
                                        >
                                            Supprimer
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                        <tr>

                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 text-2xl">
                                    💼
                                </div>

                                <h3 class="mt-4 font-black text-slate-900">
                                    Aucune offre
                                </h3>

                                <p class="mt-2 text-sm text-slate-500">
                                    Commencez par créer votre première offre d’emploi.
                                </p>

                                <a
                                    href="<?php echo e(route('admin.jobs.create')); ?>"
                                    class="mt-5 inline-flex rounded-full bg-green-700 px-5 py-3 text-sm font-bold text-white hover:bg-green-800"
                                >
                                    Créer une offre
                                </a>

                            </td>

                        </tr>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </tbody>

            </table>

        </div>


        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($offers->hasPages()): ?>

            <div class="border-t border-slate-200 p-5">
                <?php echo e($offers->links()); ?>

            </div>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\orogna-consulting-pro-v10-premium-2026-backoffice-pro\orogna-v10-work\resources\views/admin/jobs/index.blade.php ENDPATH**/ ?>