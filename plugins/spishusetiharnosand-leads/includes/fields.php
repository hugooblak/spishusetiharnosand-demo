<?php
/**
 * The form's questions and answer choices, in one place.
 *
 * Change a label here and it changes in the form, the admin inbox and the CSV export.
 *
 * @package Spishuset I HärnösandLeads
 */

defined( 'ABSPATH' ) || exit;

/**
 * Answer choices for the two multiple-choice questions.
 *
 * @return array
 */
function npl_choices() {
	return apply_filters(
		'npl_choices',
		array(
			'service'  => array(
				'replacement' => __( 'Lägga om hela taket', 'spishusetiharnosand-leads' ),
				'storm'       => __( 'Storm or hail damage', 'spishusetiharnosand-leads' ),
				'repair'      => __( 'Läcka eller reparation', 'spishusetiharnosand-leads' ),
				'inspection'  => __( 'Bara en besiktning', 'spishusetiharnosand-leads' ),
				'not-sure'    => __( 'Vet inte än', 'spishusetiharnosand-leads' ),
			),
			'timeline' => array(
				'asap'     => __( 'Så snart som möjligt', 'spishusetiharnosand-leads' ),
				'1-3'      => __( 'Inom 1–3 månader', 'spishusetiharnosand-leads' ),
				'research' => __( 'Jag kollar bara priser', 'spishusetiharnosand-leads' ),
			),
		)
	);
}

/**
 * Hidden fields that record where the visitor came from (for ad and SEO reporting).
 *
 * @return string[]
 */
function npl_tracking_fields() {
	return array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid', 'landing_page', 'referrer' );
}

/**
 * Human-readable label for a stored answer.
 *
 * @param string $field Field key.
 * @param string $value Stored value.
 * @return string
 */
function npl_label( $field, $value ) {
	$choices = npl_choices();
	return isset( $choices[ $field ][ $value ] ) ? $choices[ $field ][ $value ] : (string) $value;
}

/**
 * The consent sentence shown under the submit button. Saved with each lead as a record of what the person agreed to.
 *
 * @return string
 */
function npl_consent_text() {
	return apply_filters(
		'npl_consent_text',
		__( 'Genom att skicka förfrågan godkänner du att vi kontaktar dig om ditt tak. Vi sparar uppgifterna bara för det, lämnar dem aldrig vidare, och du kan när som helst be oss radera dem.', 'spishusetiharnosand-leads' )
	);
}

/**
 * Lead statuses for simple follow-up tracking in the admin.
 *
 * @return array
 */
function npl_statuses() {
	return array(
		'new'       => __( 'New', 'spishusetiharnosand-leads' ),
		'contacted' => __( 'Kontaktad', 'spishusetiharnosand-leads' ),
		'quoted'    => __( 'Quote sent', 'spishusetiharnosand-leads' ),
		'won'       => __( 'Won', 'spishusetiharnosand-leads' ),
		'lost'      => __( 'Lost', 'spishusetiharnosand-leads' ),
		'spam'      => __( 'Misstänkt spam', 'spishusetiharnosand-leads' ),
	);
}

/**
 * Page people land on after a successful submit.
 *
 * @return string
 */
function npl_thank_you_url() {
	$page_id = (int) get_option( 'npl_thank_you_page' );
	$url     = $page_id ? get_permalink( $page_id ) : home_url( '/thank-you/' );
	return apply_filters( 'npl_thank_you_url', $url );
}
