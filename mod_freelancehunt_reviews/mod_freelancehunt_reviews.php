<?php
/**
 * @package    Freelancehunt Reviews Module
 * @version    1.0.1
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

require_once __DIR__ . '/helper.php';

$helper = new modFreelancehuntReviewsHelper();
$ajax   = ($params->get('ajax', 0));
$limit  = $params->get('limit', 0);
$layout = $params->get('layout', 'default');
$items  = ($ajax) ? array() : $helper::getItems($params);

require ModuleHelper::getLayoutPath($module->module, $layout);