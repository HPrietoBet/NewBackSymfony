<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerPObqQSj\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerPObqQSj/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerPObqQSj.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerPObqQSj\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerPObqQSj\App_KernelDevDebugContainer([
    'container.build_hash' => 'PObqQSj',
    'container.build_id' => 'aaaa7f1a',
    'container.build_time' => 1650275261,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerPObqQSj');
