<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerUNj9xKj\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerUNj9xKj/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerUNj9xKj.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerUNj9xKj\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerUNj9xKj\App_KernelDevDebugContainer([
    'container.build_hash' => 'UNj9xKj',
    'container.build_id' => '588adfd2',
    'container.build_time' => 1652352188,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerUNj9xKj');
