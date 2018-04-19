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

?>
<?php foreach ($items as $item): ?>
	<div class="item">
		<div class="well">
			<div class="row-fluid">
				<div class="span3">
					<a href="<?php echo $item->get('snippet_url', ''); ?>" target="_blank">
						<img src="<?php echo $item->get('snippet', ''); ?>"
							 alt="<?php echo $item->get('snippet_name', ''); ?>">
					</a>
				</div>
				<div class="span9">
					<h3>
						<a href="<?php echo $item->get('snippet_url', ''); ?>" target="_blank">
							<?php echo $item->get('snippet_name', ''); ?>
						</a>
					</h3>
					<div><?php echo $item->get('snippet_comment', ''); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
