<?php
namespace Novadevs\Simultra\Base\Repositories;

/**
 * A simple interface to provide all common module methods
 */
interface ModuleInterface 
{
    public function install($cfgString);

    public function uninstall(\Novadevs\Simultra\Base\Models\Module $module);

    public function enable(\Novadevs\Simultra\Base\Models\Module $module);

    public function disable(\Novadevs\Simultra\Base\Models\Module $module);

    public function getModuleStatus(\Novadevs\Simultra\Base\Models\Module $module);

    public function _ormData($id);
}