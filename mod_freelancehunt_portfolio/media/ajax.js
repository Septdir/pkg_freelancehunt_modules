/*
 * @package    Freelancehunt Modules Package
 * @version    1.0.0
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

(function ($) {
	$(document).ready(function () {
		$('[data-mod-freelancehunt-portfolio*="ajax"]').each(function () {
			// Prepare variables
			var block = $(this),
				data = $.parseJSON('[' + block.data('mod-freelancehunt-portfolio').replace('ajax', '"ajax"') + ']'),
				itemsBlock = block.find('.items'),
				more = block.find('.ajax-more');

			// Get items
			getItems();
			more.on('click', function () {
				getItems();
			});

			// Send Ajax
			function getItems() {
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '/index.php?option=com_ajax&module=freelancehunt_portfolio&format=json&Itemid=' + data[1],
					data: {module_id: data[0], offset: itemsBlock.find('.item').length},
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
		});
	});
})(jQuery);