<?php
/**
 * DataObjectPlugin
 *
 * @copyright Copyright © 2019 Dmitry Shkoliar. All rights reserved.
 * @author    dmitry@shkoliar.com
 */

namespace Shkoliar\DebugHelper\Plugin\Magento\Framework;

use Magento\Framework\DataObject;
use Shkoliar\DebugHelper\Helper\DebugHelper;

class DataObjectPlugin
{
    /**
     * @var DebugHelper
     */
    protected $debugHelper;

    /**
     * @param DebugHelper   $debugHelper
     */
    public function __construct(DebugHelper $debugHelper)
    {
        $this->debugHelper = $debugHelper;
    }

    /**
     * @param DataObject    $subject
     * @param string|array  $key
     * @param mixed         $value
     *
     * @return array|null
     */
    public function beforeSetData(DataObject $subject, $key, $value = null)
    {
        $this->debugHelper->check($key, $value);

        return null;
    }
}
