<?php
/**
 * @package    Freelancehunt Modules Package
 * @version    1.0.2
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

if ($ajax)
{
	HTMLHelper::_('jquery.framework');
	HTMLHelper::_('script', 'media/mod_freelancehunt_portfolio/ajax.min.js', array('version' => 'auto'));
}
?>

<div <?php echo ($ajax) ? 'data-mod-freelancehunt-portfolio="' . $module->id . '"' : ''; ?>>
	<div class="items">
		<?php if (!$ajax)
		{
			require ModuleHelper::getLayoutPath($module->module, $layout . '_items');
		} ?>
	</div>
	<?php if ($ajax && $limit): ?>
		<div class="row-fluid">
			<a class="btn span12 ajax-more"><?php echo Text::_('MOD_FREELANCEHUNT_PORTFOLIO_AJAX_MORE'); ?></a>
		</div>
	<?php endif; ?>
</div>