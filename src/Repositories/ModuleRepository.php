<?php
namespace Novadevs\Simultra\Base\Repositories;

use \stdClass;

/**
 * Module repository, it contais commonly used queries
 */
class ModuleRepository implements ModuleInterface
{

    /**
     * Module Eloquent model
     *
     * @var \Novadevs\Simultra\Base\Models $moduleModel
     */
    protected $moduleModel;

    /**
     * Module configuration
     *
     * @var array $config
     */
    protected $config;

    /**
     * Setting the $moduleModel property from the injected model. If the module already exists in database, its stored in $moduleModel.
     *
     * @param \Novadevs\Simultra\Base\Models\Module $module
     * @param \Illuminate\Http\Request $data
     * @return ModuleRepository
     */
    public function __construct(\Novadevs\Simultra\Base\Models\Module $module)
    {
        $this->moduleModel = $module;
    }
    
    /**
     * Install method wich persists config data to database and checks if module is already installed
     *
     * @param string $cfgString The PSR config string.
     * @return boolean
     */
    public function install($cfgString)
    {        
        $this->config = config($cfgString);

        foreach ($this->config as $k => $v) {
            is_array($v) ? $this->moduleModel->$k = json_encode($v) : $this->moduleModel->$k = $v;
        }

        try {
            $this->moduleModel->save();
        } catch (\Exception $e) {
            switch ($e->getCode()) {
                case '23000':
                    report($e);
                    return 'ERROR: The module is already installed. See laravel-log file for more details.';
                    break;
                
                default:
                    report($e);
                    return 'UNHANDLED ERROR: ' . $e->getMessage();
                    break;
            }
        }
        return 1;
    }

    /**
     * Change module status to uninstalled (2)
     *
     * @param \Novadevs\Simultra\Base\Models\Module $module
     * @return boolean
     */
    public function uninstall(\Novadevs\Simultra\Base\Models\Module $module)
    {
        if ($module == null) {
            return false;
        } else {
            $module->status = 2;
            $module->save();
            return true;
        }
    }

    /**
     * Change module status to enabled (1)
     *
     * @param \Novadevs\Simultra\Base\Models\Module $module
     * @return boolean
     */
    public function enable(\Novadevs\Simultra\Base\Models\Module $module)
    {
        if ($module == null) {
            return false;
        } else {
            $module->status = 1;
            $module->save();
            return true;
        }
    }

    /**
     * Change module status to disabled (0)
     *
     * @param \Novadevs\Simultra\Base\Models\Module $module
     * @return boolean
     */
    public function disable(\Novadevs\Simultra\Base\Models\Module $module)
    {
        if ($module == null) {
            return false;
        } else {
            $module->status = 0;
            $module->save();
            return true;
        }
    }

    /**
	 * Determines whether the module is enabled.
     * 
     * @param Novadevs\Simultra\Base\Models\Module $module
	 * @return boolean
	 */
	public function getModuleStatus(\Novadevs\Simultra\Base\Models\Module $module)
	{
        $status = $this->moduleModel->status;
        switch ($status) {
            case 0: // Disabled
                return false;
                break;

            case 1: // Enabled
                return true;
                break;

            case 2: // Uninstalled
                return false;
                break;
            
            default:
                return false;
                break;
        }
    }

    /**
     * Converting the Eloquent object to a stdClass format
     *
     * @return void
     */
    public function toStd()
    {
        $module = $this->moduleModel;

        if ($module == null) {
            return null;
        } else {
            $obj = new stdClass();
        }

        $obj->id = $module->id;
        $obj->name = $module->name;
        $obj->depends_of = $module->depends_of;
        $obj->status = $module->status;
        $obj->version = $module->version;

        return $obj;
    }

    /**
     * Get the Eloquent Module model
     *
     * @param int $id
     * @return object
     */
    public function _ormData($id)
    {
        $module = $this->moduleModel->find($id);
        return $module;
    }
}