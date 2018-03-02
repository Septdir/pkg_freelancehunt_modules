<?php
/**
 * @package    Freelancehunt Profile Module
 * @version    1.0.0
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;

if ($params->get('ajax', 0))
{
	$Itemid = Factory::getApplication()->input->get('Itemid');
	HTMLHelper::_('jquery.framework');
	HTMLHelper::_('script', 'media/mod_freelancehunt_profile/ajax.min.js', array('version' => 'auto'));
	echo '<div data-mod-freelancehunt-profile="' . $module->id . ', ' . $Itemid . '"></div>';
}
else
{
	include_once(__DIR__ . '/helper.php');
	$profile = modFreelancehuntProfileHelper::getProfile($params);
	require ModuleHelper::getLayoutPath('mod_freelancehunt_profile', $params->get('layout', 'default'));
}
