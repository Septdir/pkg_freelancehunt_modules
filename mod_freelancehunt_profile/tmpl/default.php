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

?>
<?php if ($error = $profile->get('error')): ?>
	<div class="alert alert-error">
		<strong><?php echo $error->code; ?></strong> <?php echo $error->message; ?>
	</div>
<?php else: ?>
	<div class="well">
		<div class="row-fluid">
			<div class="span1">
				<img src="<?php echo $profile->get('avatar', ''); ?>" alt="<?php echo $profile->get('fname', '') . ' ' .
					$profile->get('sname', ''); ?>">
			</div>
			<div class="span11">
				<div class="clearfix">
					<div class="pull-right">
						<span class="text-info">
							<i class="icon icon-bars"></i><?php echo $profile->get('rating', 0); ?>
						</span>
						<span class="text-success">
							<i class="icon icon-thumbs-up"></i><?php echo $profile->get('positive_reviews', 0); ?>
						</span>
						<span class="text-error">
							<i class="icon icon-thumbs-down"></i><?php echo $profile->get('negative_reviews', 0); ?>
						</span>
						<a href="<?php echo $profile->get('url_private_message', ''); ?>" target="_blank">
							<i class="icon icon-mail"></i>
						</a>
					</div>
					<div class="pull-left">
						<a href="<?php echo $profile->get('url') . $profile->get('referral'); ?>"
						   class="lead" target="_blank">
							<?php echo $profile->get('fname', '') . ' ' . $profile->get('sname', ''); ?>
						</a>
					</div>
				</div>
				<div>
					<?php echo $profile->get('cv'); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>