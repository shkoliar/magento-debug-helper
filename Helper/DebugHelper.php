<?php
/**
 * DebugHelper
 *
 * @copyright Copyright © 2019 Dmitry Shkoliar. All rights reserved.
 * @author    dmitry@shkoliar.com
 */

namespace Shkoliar\DebugHelper\Helper;

use Magento\Framework\App\RequestInterface;

class DebugHelper
{
    const DEBUG_HELPER_SEARCH = 'XDS';

    const XDEBUG_SESSION = 'XDEBUG_SESSION';

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * Checks key and value if it contains the searched query and makes the debugger break.
     *
     * @param string|array  $key
     * @param string        $value
     *
     * @return void
     */
    public function check($key, $value)
    {
        if ($searchedValue = $this->getSearchedQuery()) {
            if (is_scalar($key)) {
                $key = [
                    $key => $value
                ];
            }

            foreach ($key as $k => $v) {
                if (is_scalar($v) && (stripos($v, $searchedValue) !== false ||
                        stripos(html_entity_decode($v), $searchedValue) !== false)) {
                    function_exists('xdebug_break') && xdebug_break();
                    $found = true;
                }
            }
        }
    }

    /**
     * Checks if debug session is active and returns searched query or false.
     *
     * @return string|bool
     */
    private function getSearchedQuery()
    {
        if ($this->request->getCookie(self::XDEBUG_SESSION, '') && extension_loaded('xdebug')) {
            return $this->request->getParam(self::DEBUG_HELPER_SEARCH, '');
        }

        return false;
    }
}
