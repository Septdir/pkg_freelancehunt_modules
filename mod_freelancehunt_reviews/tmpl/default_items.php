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

use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

?>
<?php foreach ($items as $item):
	$from = $item->get('from', false);
	$project = $item->get('project', false);
	?>
	<div class="item">
		<div class="well">
			<div class="row-fluid">
				<div class="span2">
					<?php if ($from): ?>
						<img src="<?php echo $from->get('avatar_md', $from->get('avatar', '')); ?>"
							 alt="<?php echo $from->get('fname', '') . ' ' . $from->get('sname', ''); ?>"
							 class="span12">
						<h4 class="text-center">
							<a href="<?php echo $from->get('url', '') . $from->get('referral', ''); ?>" target="_blank">
								<?php echo $from->get('fname', '') . ' ' . $from->get('sname', ''); ?>
							</a>
						</h4>
					<?php endif; ?>
				</div>
				<div class="span10">
					<div class="text-right muted">
						<?php echo HTMLHelper::_('date', $item->get('review_time', ''), 'd.m.Y H:i'); ?>
					</div>
					<?php if ($project): ?>
						<h3>
							<a href="<?php echo $project->get('url', '') . $project->get('referral', ''); ?>"
							   target="_blank">
								<?php echo $project->get('name', ''); ?>
							</a>
						</h3>
					<?php endif; ?>
					<div>
						<?php echo $item->get('review_comment', ''); ?>
					</div>

					<dl class="dl-horizontal">
						<dt><?php echo Text::_('MOD_FREELANCEHUNT_REVIEWS_GRADE'); ?></dt>
						<dd>
							<?php for ($i = 1; $i <= 10; $i++)
							{
								$star = ($i > $item->get('grade_average', 0)) ? 'star-empty' : 'star';
								echo '<i class="icon-' . $star . '"></i>';
							} ?>
						</dd>
						<dt><?php echo Text::_('MOD_FREELANCEHUNT_REVIEWS_GRADE_QUALITY'); ?></dt>
						<dd>
							<?php for ($i = 1; $i <= 10; $i++)
							{
								$star = ($i > $item->get('grade_quality', 0)) ? 'star-empty' : 'star';
								echo '<i class="icon-' . $star . '"></i>';
							} ?>
						</dd>
						<dt><?php echo Text::_('MOD_FREELANCEHUNT_REVIEWS_GRADE_PROFESSIONALISM'); ?></dt>
						<dd>
							<?php for ($i = 1; $i <= 10; $i++)
							{
								$star = ($i > $item->get('grade_professionalism', 0)) ? 'star-empty' : 'star';
								echo '<i class="icon-' . $star . '"></i>';
							} ?>
						</dd>
						<dt><?php echo Text::_('MOD_FREELANCEHUNT_REVIEWS_GRADE_COST'); ?></dt>
						<dd>
							<?php for ($i = 1; $i <= 10; $i++)
							{
								$star = ($i > $item->get('grade_cost', 0)) ? 'star-empty' : 'star';
								echo '<i class="icon-' . $star . '"></i>';
							} ?>
						</dd>
						<dt><?php echo Text::_('MOD_FREELANCEHUNT_REVIEWS_GRADE_SCHEDULE'); ?></dt>
						<dd>
							<?php for ($i = 1; $i <= 10; $i++)
							{
								$star = ($i > $item->get('grade_schedule', 0)) ? 'star-empty' : 'star';
								echo '<i class="icon-' . $star . '"></i>';
							} ?>
						</dd>
						<dt><?php echo Text::_('MOD_FREELANCEHUNT_REVIEWS_GRADE_CONNECTIVITY'); ?></dt>
						<dd>
							<?php for ($i = 1; $i <= 10; $i++)
							{
								$star = ($i > $item->get('grade_connectivity', 0)) ? 'star-empty' : 'star';
								echo '<i class="icon-' . $star . '"></i>';
							} ?>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>