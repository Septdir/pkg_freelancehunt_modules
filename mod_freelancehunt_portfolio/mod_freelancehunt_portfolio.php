<?php
/**
 * @package    Freelancehunt Portfolio Module
 * @version    1.0.1
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;

$data = $module->id . ', ' . Factory::getApplication()->input->get('Itemid');

if ($params->get('ajax', 0))
{
	$items = array();
	$data  .= ', ajax';
}
else
{
	include_once(__DIR__ . '/helper.php');
	$items = modFreelancehuntPortfolioHelper::getItems($params);
}


require ModuleHelper::getLayoutPath('mod_freelancehunt_portfolio', $params->get('layout', 'default'));