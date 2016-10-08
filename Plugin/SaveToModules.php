<?php
/**
 * @package     SamTay\ModuleManager
 * @version     1.0.0
 * @author      Sam Tay
 */
namespace SamTay\ModuleManager\Plugin;

use SamTay\ModuleManager\Helper\ModuleConfig as CustomModuleConfig;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\DeploymentConfig;

class SaveToModules
{
    /**
     * @var CustomModuleConfig
     */
    private $moduleConfig;

    /**
     * @param CustomModuleConfig $moduleConfig
     */
    public function __construct(CustomModuleConfig $moduleConfig)
    {
        $this->moduleConfig = $moduleConfig;
    }

    /**
     * Write to modules.php after config.php
     *
     * @param DeploymentConfig\Writer $subject
     * @param $result
     */
    public function afterSaveConfig(DeploymentConfig\Writer $subject, $result)
    {
        $this->moduleConfig->saveModulesToConfig();
    }
}
