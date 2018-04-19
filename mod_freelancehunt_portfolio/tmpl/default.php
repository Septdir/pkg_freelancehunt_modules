<?php
/**
 * @package    Freelancehunt Modules Package
 * @version    1.0.1
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

if ($params->get('ajax', 0))
{
	HTMLHelper::_('jquery.framework');
	HTMLHelper::_('script', 'media/mod_freelancehunt_portfolio/ajax.js', array('version' => 'auto'));
}
?>

<div data-mod-freelancehunt-portfolio="<?php echo $data; ?>">
	<div class="items">
		<?php require ModuleHelper::getLayoutPath('mod_freelancehunt_portfolio',
			$params->get('layout', 'default') . '_items'); ?>
	</div>
	<?php if ($params->get('ajax', 0) && $params->get('limit', 0)): ?>
		<div class="row-fluid">
			<a class="btn span12 ajax-more"><?php echo Text::_('MOD_FREELANCEHUNT_PORTFOLIO_AJAX_MORE'); ?></a>
		</div>
	<?php endif; ?>
</div>
