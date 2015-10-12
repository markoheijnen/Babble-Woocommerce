<?php
/*
Plugin Name: Babble Woocommerce
Plugin URI:  https://markoheijnen.com
Description: Multilingual WordPress done right for Woocommerce
Version:     1.0
Author:      Marko Heijnen
Author URI:  https://markoheijnen.com
Text Domain: babble-woocommerce
Domain Path: /languages/
License:     GPL v2 or later

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

class Babble_Woocommerce {

	public function __contruct() {
		add_filter( 'bbl_translated_taxonomy', array( $this, 'bbl_translated_taxonomy' ), 10, 2 );
		add_filter( 'bbl_translated_meta_fields', array( $this, 'bbl_translated_meta_fields' ), 10, 2 );
	}


	public function bbl_translated_taxonomy( $translated, $taxonomy ) {
		if ( 'product_type' == $taxonomy ) {
			return false;
		}
	}

	public function bbl_translated_meta_fields( array $fields, WP_Post $post ) {
		$fields['_purchase_note'] = new Babble_Meta_Field_Textarea( $post, '_purchase_note', _x( 'Purchase Note', 'Woocommerce plugin meta field', 'babble-woocommerce' ) );

		return $fields;
	}

}

new Babble_Woocommerce;