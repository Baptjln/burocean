<?php /**
 * Template version: 4.0.0
 * Template zone: frontend
 *
 * -= 4.0.0 =-
 * - Code cleanup
 *
 * -= 3.0.0 =-
 * - Initial version
 */ ?>

<?php
/*  Copyright 2013 Foobar Studio (contact@foobar.studio)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/
?>

<?php /** @var $address array */ ?>
<?php /** @var $address_id string */ ?>
<?php /** @var $address_class string */ ?>
<?php /** @var $address_label string */ ?>
<?php /** @var $excluded_fields array */ ?>

<?php if (!empty($address_label)) : ?>
	<?php echo esc_html($address_label); ?><br><br>
<?php endif; ?>

<?php if (CUAR_AddressHelper::compare_addresses(CUAR_AddressHelper::sanitize_address([]), $address)) : ?>
	<?php esc_html_e('No address yet', 'cuar'); ?>
<?php else: ?>
	<?php if (!empty($address['name'])) : ?>
		<strong><?php echo esc_html($address['name']); ?></strong><br>
	<?php endif; ?>

	<?php if (!empty($address['company'])) : ?>
		<strong><?php echo esc_html($address['company']); ?></strong><br>
	<?php endif; ?>

	<?php if (!empty($address['vat_number'])) : ?>
		<?php printf(esc_html__('VAT ID - %s', 'cuar'), esc_html($address['vat_number'])); ?><br>
	<?php endif; ?>

	<?php if (!empty($address['line1'])) : ?>
		<?php echo esc_html($address['line1']); ?><br>
	<?php endif; ?>
	<?php if (!empty($address['line2'])) : ?>
		<?php echo esc_html($address['line2']); ?><br>
	<?php endif; ?>
	<?php if (!empty($address['zip']) || !empty($address['city'])) : ?>
		<?php echo esc_html($address['zip']); ?>&nbsp;<?php echo esc_html($address['city']); ?><br>
	<?php endif; ?>
	<?php if (!empty($address['state']) || !empty($address['country'])) : ?>
		<?php if (!empty($address['state'])) : ?>
			<?php echo esc_html(CUAR_CountryHelper::getStateName($address['country'], $address['state'])); ?>,&nbsp;<?php endif; ?>
		<?php echo esc_html(CUAR_CountryHelper::getCountryName($address['country'])); ?>
	<?php endif; ?>
<?php endif; ?>
