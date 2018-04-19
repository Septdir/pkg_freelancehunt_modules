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

use Joomla\CMS\Factory;
use Joomla\Registry\Registry;
use Joomla\CMS\Helper\ModuleHelper;


class modFreelancehuntProfileHelper
{
	/**
	 * Get Profile layout
	 *
	 * @return bool|string
	 *
	 * @since 1.0.0
	 */
	public static function getAjax()
	{
		if ($params = self::getModuleParams(Factory::getApplication()->input->get('module_id', 0)))
		{
			$profile = self::getProfile($params);
			ob_start();
			require ModuleHelper::getLayoutPath('mod_freelancehunt_profile', $params->get('layout', 'default'));
			$response = ob_get_contents();
			ob_end_clean();

			return $response;
		}

		return false;
	}

	/**
	 * Get Profile layout
	 *
	 * @param Registry $params Module parameters
	 *
	 * @return Registry
	 * @since 1.0.0
	 */
	public static function getProfile($params)
	{
		// Send request
		$url  = 'https://api.freelancehunt.com/profiles/me';
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_USERPWD        => trim($params->get('token', '', 'raw')) . ':' .
				base64_encode(hash_hmac('sha256', $url . 'GET', trim($params->get('secret', '', 'raw')),
					true)),
			CURLOPT_URL            => $url
		));
		$profile = new Registry(curl_exec($curl));
		curl_close($curl);

		// Add referral
		$profile->set('referral', '?r=' . $params->get('referral', 'Byv3Y'));

		return $profile;
	}

	/**
	 * Get Module parameters
	 *
	 * @param int $pk module id
	 *
	 * @return bool|Registry
	 *
	 * @since 1.0.0
	 */
	protected static function getModuleParams($pk = null)
	{
		$pk = (empty($pk)) ? Factory::getApplication()->input->get('module_id', 0) : $pk;
		if (empty($pk))
		{
			return false;
		}

		// Get Params
		$db    = Factory::getDbo();
		$query = $db->getQuery(true)
			->select('params')
			->from('#__modules')
			->where('id =' . $pk);
		$db->setQuery($query);
		$params = $db->loadResult();

		return (!empty($params)) ? new Registry($params) : false;
	}
}