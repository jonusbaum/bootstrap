<?php
/**
 * Import Location(s) Tool.
 * @package Maps
 * @author Flipper Code <hello@flippercode.com>
 */

$form  = new WPGMP_Template();
$form->set_header( __( 'Import Locations', WPGMP_TEXT_DOMAIN ),$response );

$supported_delimiters = array(
	',' => __( 'Comma (,)',WPGMP_TEXT_DOMAIN ),
	';' => __( 'Semicolon (;)',WPGMP_TEXT_DOMAIN ),
	':' => __( 'Colon (:)',WPGMP_TEXT_DOMAIN ),
	'|' => __( 'Bar (|)',WPGMP_TEXT_DOMAIN ),
	'tab' => __( 'Tab (\t)',WPGMP_TEXT_DOMAIN ),
	'space' => __( 'Space ( )',WPGMP_TEXT_DOMAIN ),
	);
$form->add_element( 'radio', 'wpgmp_csv_delimiter', array(
	'label' => __( 'Choose Delimiter', WPGMP_TEXT_DOMAIN ),
	'radio-val-label' => $supported_delimiters,
	'current' => '',
	'class' => 'chkbox_class inline',
	'default_value' => ',',
));

$form->add_element('file','import_file',array(
	'label' => __( 'Choose File',WPGMP_TEXT_DOMAIN ),
	'class' => 'file_input',
	'desc' => __( 'Please upload a valid CSV file.',WPGMP_TEXT_DOMAIN ),
));

$form->add_element('submit','import_loc',array(
	'value' => __( 'Import Locations',WPGMP_TEXT_DOMAIN ),
	'no-sticky' => true,

));
$html = '<p>Below are the detailed instruction to import your data successfully.</p>';
$html .= '<div class="fc-table-responsive">
 <table class="fc-table">
 <thead><tr><th>#</th><th>Column Name</th><th>Column Required?</th><th>Details</th></tr></thead>
 <tbody>
 <tr>
 <td scope="fc-divider">1</td> <td>title</td><td>YES</td><td>Title of the Location.</td> </tr>
 <td scope="fc-divider">2</td> <td>address</td><td>YES</td><td>Address of the Location.</td></tr>
 <td scope="fc-divider">3</td> <td>latitude</td><td>NO</td><td>Latitude of the Location.</td></tr>
 <td scope="fc-divider">4</td> <td>longitude</td><td>NO</td><td>Longitude of the Location.</td></tr>
 <td scope="fc-divider">5</td> <td>message</td><td>NO</td><td>Message you want to show in the infowindow.</td></tr>
 <td scope="fc-divider">6</td> <td>categories</td><td>NO</td><td>Assign category to the location. Multiple categories should be separated by comma.</td></tr>
 <td scope="fc-divider">7</td> <td>city</td><td>NO</td><td>City of the Location.</td></tr>
 <td scope="fc-divider">8</td> <td>state</td><td>NO</td><td>State of the Location.</td></tr>
 <td scope="fc-divider">9</td> <td>country</td><td>NO</td><td>Country of the Location.</td></tr>
 <td scope="fc-divider">10</td> <td>postal code</td><td>NO</td><td>Postal Code of the Location.</td></tr>
 <td colspan="4" class="alert alert-info">if you want to add custom fields/extra fields in location details, you can do that easily. Just add more columns in the csv and they\'ll be treated as extra fields. e.g let\'s add fax, website and email details.</td></tr>
 <td scope="fc-divider">11</td> <td>fax</td><td>NO</td><td>Fax will be added as extra field in location details.</td></tr>
 <td scope="fc-divider">12</td> <td>website</td><td>NO</td><td>Website will be added as extra field in location details.</td></tr>
 <td scope="fc-divider">13</td> <td>email</td><td>NO</td><td>Email will be added as extra field in location details.</td>
 </tr>
 </tr></tbody>
</table>
</div>
<br>
<a class="fc-btn fc-btn-default" href="'.WPGMP_URL.'assets/import_sample_file.zip'.'"> Download Sample File</a>
';


$form->add_element('html','instruction_html', array(
	'html' => $html,
	'before' => '<div class="fc-11">',
	'after' => '</div>',
	));
$form->add_element('hidden','operation',array(
	'value' => 'import_location',
));
$form->add_element('hidden','import',array(
	'value' => 'location_import',
));
$form->render();
