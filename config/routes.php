<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    // $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/', ['controller' => 'Listings', 'action' => 'index']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    // $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /*Listings*/
    $routes->connect('/listings/details/:id/:slug', ['controller' => 'Listings', 'action' => 'view'], ['pass' => ['id', 'slug'], 'id' => '[0-9]+']);
    $routes->connect('/listings/new', ['controller' => 'Listings', 'action' => 'latest']);
    $routes->connect('/listings/exclusive', ['controller' => 'Listings', 'action' => 'group', 1]);
    $routes->connect('/listings/premium', ['controller' => 'Listings', 'action' => 'group', 2]);
    $routes->connect('/listings/normal', ['controller' => 'Listings', 'action' => 'group', 3]);
    $routes->connect('/listings/trial', ['controller' => 'Listings', 'action' => 'group', 4]);
    $routes->connect('/listings/scam', ['controller' => 'Listings', 'action' => 'group', 5]);

    /*Articles*/
    $routes->connect('/blog', ['controller' => 'Articles', 'action' => 'index']);
    $routes->connect('/blog/:id/:slug', ['controller' => 'Articles', 'action' => 'view'], ['pass' => ['id', 'slug'], 'id' => '[0-9]+']);
    $routes->connect('/blog/hyip-news', ['controller' => 'Articles', 'action' => 'category', 1]);
    $routes->connect('/blog/hyip-blog', ['controller' => 'Articles', 'action' => 'category', 2]);
    $routes->connect('/blog/hyip-reviews', ['controller' => 'Articles', 'action' => 'category', 3]);

    /*Pages*/
    $routes->connect('/services', ['controller' => 'Pages', 'action' => 'display', 'services']);
    $routes->connect('/contact', ['controller' => 'Pages', 'action' => 'display', 'contact']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});

Router::prefix('admin', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->connect('/', ['controller' => 'Listings', 'action' => 'index']);
    
    $routes->fallbacks('DashedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
