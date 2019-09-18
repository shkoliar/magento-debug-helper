<?php
/**
 * AbstractModelPlugin
 *
 * @copyright Copyright © 2019 Dmitry Shkoliar. All rights reserved.
 * @author    dmitry@shkoliar.com
 */

namespace Shkoliar\DebugHelper\Plugin\Magento\Framework\Model;

use Magento\Framework\Model\AbstractModel;
use Shkoliar\DebugHelper\Helper\DebugHelper;

class AbstractModelPlugin
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
     * @param AbstractModel $subject
     * @param string|array  $key
     * @param mixed         $value
     *
     * @return array|null
     */
    public function beforeSetData(AbstractModel $subject, $key, $value = null)
    {
        $this->debugHelper->check($key, $value);

        return null;
    }
}
