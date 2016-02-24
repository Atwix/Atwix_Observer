<?php
/**
 * Atwix
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 * @category    For article
 * @package     Atwix_Observer
 * @author      Atwix Core Team
 * @copyright   Copyright (c) 2016 Atwix (http://www.atwix.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Atwix_Observer_Model_Observer
{

    /**
     * Get route name by the Varien_Event_Observer object
     *
     * @param Varien_Event_Observer $observer
     * @return bool|string
     */
    protected function _getRouteByObserver(Varien_Event_Observer $observer)
    {
        //  interaction with event data
        //  we can write $this instead of using $observer
        if ($observer->hasControllerAction()) {
            $controllerAction = $observer->getControllerAction();
            $request = $controllerAction->getRequest();

            return $request->getRequestUri();
        }

        return false;
    }

    /**
     * Log all of the requests
     *
     * @param Varien_Event_Observer $observer
     */
    public function logAllRequests(Varien_Event_Observer $observer)
    {
        $route = $this->_getRouteByObserver($observer);
        if ($route) {
            Mage::log($route, null, 'global.log', true);
        }
    }

    /**
     * Log the requests from the adminhtml area
     *
     * @param Varien_Event_Observer $observer
     */
    public function logAdminhtmlRequests(Varien_Event_Observer $observer)
    {
        $route = $this->_getRouteByObserver($observer);
        if ($route) {
            Mage::log($route, null, 'adminhtml.log', true);
        }
    }

    /**
     * Log the requests from the frontend area
     *
     * @param Varien_Event_Observer $observer
     */
    public function logFrontendRequests(Varien_Event_Observer $observer)
    {
        $route = $this->_getRouteByObserver($observer);
        if ($route) {
            Mage::log($route, null, 'frontend.log', true);
        }
    }

}