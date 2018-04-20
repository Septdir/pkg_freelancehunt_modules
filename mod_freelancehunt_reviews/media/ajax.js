/*
 * @package    Freelancehunt Modules Package
 * @version    1.0.2
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

(function ($) {
	$(document).ready(function () {
		$('[data-mod-freelancehunt-reviews]').each(function () {
			// Prepare variables
			var block = $(this),
				module_id = block.data('mod-freelancehunt-reviews'),
				itemsBlock = block.find('.items'),
				more = block.find('.ajax-more');

			// Send Ajax
			function getItems() {
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '/index.php?option=com_ajax&module=freelancehunt_reviews&format=json',
					data: {module_id: module_id, offset: itemsBlock.find('.item').length},
					success: function (response) {
						if (response.data) {
							$(response.data).appendTo(itemsBlock);
						}
						else {
							more.hide();
						}
					}
				});
			}

			// Get items
			getItems();
			more.on('click', function () {
				getItems();
			});
		});
	});
})(jQuery);