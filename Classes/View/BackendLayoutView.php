<?php
namespace FluidTYPO3\Flux\View;

/*
 * This file is part of the FluidTYPO3/Flux project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Flux\Provider\Interfaces\GridProviderInterface;
use TYPO3\CMS\Backend\View\BackendLayout\DataProviderCollection;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class BackendLayoutView extends \TYPO3\CMS\Backend\View\BackendLayoutView
{
    /**
     * @var GridProviderInterface
     */
    protected $provider;

    /**
     * @var array
     */
    protected $record;

    public function setProvider(GridProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function setRecord(array $record)
    {
        $this->record = $record;
    }

    protected function initializeDataProviderCollection()
    {
        $this->setDataProviderCollection(GeneralUtility::makeInstance(DataProviderCollection::class));
    }

    public function getSelectedBackendLayout($pageId)
    {
        return $this->provider->getGrid($this->record)->buildExtendedBackendLayoutArray();
    }
}
