<?php
/**
 * @package    Freelancehunt Profile Module
 * @version    1.0.1
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;

if ($params->get('ajax', 0))
{
	HTMLHelper::_('jquery.framework');
	HTMLHelper::_('script', 'media/mod_freelancehunt_profile/ajax.min.js', array('version' => 'auto'));
	echo '<div data-mod-freelancehunt-profile="' . $module->id . '"></div>';
}
else
{
	include_once(__DIR__ . '/helper.php');
	$profile = modFreelancehuntProfileHelper::getProfile($params);
	require ModuleHelper::getLayoutPath($module->module, $params->get('layout', 'default'));
}
