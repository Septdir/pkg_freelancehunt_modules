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
		$('[data-mod-freelancehunt-profile]').each(function () {
			// Prepare variables
			var block = $(this),
				module_id = block.data('mod-freelancehunt-profile');

			// Get Profile HTML
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '/index.php?option=com_ajax&module=freelancehunt_profile&format=json',
				data: {module_id: module_id},
				success: function (response) {
					if (response.data) {
						block.html(response.data);
					}
				}
			});
		});
	});
})(jQuery);