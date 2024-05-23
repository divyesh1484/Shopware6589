<?php declare(strict_types=1);

namespace ICTCustomField;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;
use ICTCustomField\Service\ICTCustomFieldsInstaller;

class ICTCustomField extends Plugin
{
    public function install(InstallContext $installContext): void
    {
        // Do stuff such as creating a new payment method
        $this->getICTCustomFieldsInstaller()->install($installContext->getContext());
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);

       if ($uninstallContext->keepUserData()) {
           return;
       }

        $this->getICTCustomFieldsInstaller()->deleteRelations($uninstallContext->getContext());
        // Remove or deactivate the data created by the plugin
    }

    public function activate(ActivateContext $activateContext): void
    {
        // Activate entities, such as a new payment method
        // Or create new entities here, because now your plugin is installed and active for sure
        $this->getICTCustomFieldsInstaller()->addRelations($activateContext->getContext());
    }

    public function deactivate(DeactivateContext $deactivateContext): void
    {
        // Deactivate entities, such as a new payment method
        // Or remove previously created entities
        $this->getICTCustomFieldsInstaller()->deleteRelations($deactivateContext->getContext());
    }

    public function update(UpdateContext $updateContext): void
    {
        // Update necessary stuff, mostly non-database related
    }

    public function postInstall(InstallContext $installContext): void
    {
    }

    public function postUpdate(UpdateContext $updateContext): void
    {
    }
    private function getICTCustomFieldsInstaller(): ICTCustomFieldsInstaller
    {
        if ($this->container->has(ICTCustomFieldsInstaller::class)) {
            return $this->container->get(ICTCustomFieldsInstaller::class);
        }

        return new ICTCustomFieldsInstaller(
            $this->container->get('custom_field_set.repository'),
            $this->container->get('custom_field_set_relation.repository')
        );
    }

}
