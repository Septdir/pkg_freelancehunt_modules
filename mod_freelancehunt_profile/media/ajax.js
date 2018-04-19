/*
 * @package    Freelancehunt Modules Package
 * @version    1.0.1
 * @author     Igor Berdicheskiy - septdir.ru
 * @copyright  Copyright (c) 2013 - 2018 Igor Berdicheskiy. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://septdir.ru
 */

(function ($) {
	$(document).ready(function () {
		$('[data-mod-freelancehunt-profile]').each(function () {
			// Prepare variables
			var block = $(this),
				data = $.parseJSON('[' + block.data('mod-freelancehunt-profile') + ']');

			// Get Profile HTML
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '/index.php?option=com_ajax&module=freelancehunt_profile&format=json&Itemid=' + data[1],
				data: {module_id: data[0]},
				success: function (response) {
					if (response.data) {
						block.html(response.data);
					}
				}
			});
		});
	});
})(jQuery);