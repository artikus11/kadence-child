<?php

namespace Art\DSG;

class Shortcodes {

	public function setup_hooks() {

		add_shortcode( 'header_contact', [ $this, 'header_content' ] );

		add_shortcode( 'footer_contact', [ $this, 'footer_content' ] );
	}


	/**
	 * @param  string $number
	 *
	 * @return string
	 */
	protected function sanitize_number( string $number )
	: string {

		return trim( preg_replace( '/[^\d|\+]/', '', $number ) );
	}


	/**
	 * Шорткод вывода контактных данных в подвале
	 */
	public function header_content( $atts ) {

		$atts = shortcode_atts(
			[
				'phone'    => '',
				'whatsapp' => '',
			],
			$atts
		);

		$phone    = $atts['phone'] ?? '';
		$whatsapp = $atts['whatsapp'] ?? '';

		?>
		<style>
			.header-contact {
				display: flex;
				flex-direction: row;
			}

			.header-contact .header-contact-item {
				display: flex;
				align-items: center;
				margin-bottom: 0;
				margin-right: 20px;
			}

			.header-contact .header-contact-label {
				font-size: 16px;
				line-height: 1.2;
				margin-left: 10px;
			}

			.header-contact .header-contact-icon {
				width: 30px;
				height: 30px;
			}

			.header-contact .header-contact-follow .header-contact-label {
				font-weight: bold;
			}

			.header-contact .header-contact-follow .header-contact-icon {
				width: 48px;
				height: 48px;
			}
		</style>
		<div class="header-contact">
			<div class="header-contact-item header-contact-phone">
			<span class="header-contact-icon">
<svg width="30" height="30" fill="none"><defs/><path fill="#e82d00" d="M15 30a15 15 0 100-30 15 15 0 000 30z"/><path fill="#FAFAFA"
                                                                                                                     d="M22.5 18.1c-1.62 0-3.16-.35-4.58-1.05a.95.95 0 00-1.26.43l-.68 1.4a13.2 13.2 0 01-4.87-4.86l1.4-.68a.94.94 0 00.44-1.26A10.32 10.32 0 0111.9 7.5a.94.94 0 00-.94-.94H7.5a.94.94 0 00-.94.94c0 8.79 7.15 15.94 15.94 15.94.52 0 .94-.42.94-.94v-3.46a.94.94 0 00-.94-.94z"/></svg>
			</span>
				<a href="tel:<?php echo esc_html( $this->sanitize_number( $phone ) ); ?>"
				   class="header-contact-label"><?php echo esc_html( $phone ); ?></a>
			</div>
			<div class="header-contact-item header-contact-whatsapp">

			<span class="header-contact-icon">
				<svg width="30" height="30" fill="none"><defs/><rect width="30" height="30" fill="#0DC143" rx="15"/><path fill="#fff"
				                                                                                                          d="M21.72 8.26A8.64 8.64 0 006.96 14.4c0 1.5.43 2.98 1.14 4.3l-1.23 4.5 4.59-1.19c1.27.71 2.7 1.04 4.11 1.04a8.7 8.7 0 006.15-14.8zm-6.1 13.33a7.03 7.03 0 01-3.64-.99l-.29-.14-2.74.7.7-2.69-.18-.28a7.16 7.16 0 012.32-9.89 7.15 7.15 0 019.88 2.32 7.15 7.15 0 01-2.32 9.89 6.9 6.9 0 01-3.73 1.08zm4.16-5.25l-.52-.23s-.76-.33-1.23-.57c-.05 0-.1-.05-.14-.05a.68.68 0 00-.33.1l-.71.8a.26.26 0 01-.24.14h-.05a.36.36 0 01-.19-.09l-.23-.1a4.6 4.6 0 01-1.37-.9c-.1-.09-.24-.18-.33-.28a5.28 5.28 0 01-.9-1.13l-.05-.1c-.05-.04-.05-.1-.1-.19 0-.1 0-.19.05-.23l.33-.38c.1-.1.15-.24.24-.33.1-.14.14-.33.1-.48-.05-.23-.62-1.5-.76-1.8a.55.55 0 00-.33-.23h-.52c-.1 0-.2.05-.29.05l-.04.05c-.1.04-.2.14-.29.18-.1.1-.14.2-.24.29a2.41 2.41 0 00-.28 2.55l.05.14c.42.9 1 1.7 1.75 2.42l.19.19c.14.14.28.23.38.37.99.86 2.12 1.47 3.4 1.8.14.05.33.05.47.1h.48c.23 0 .52-.1.7-.2.15-.09.24-.09.34-.18l.1-.1c.09-.1.18-.14.28-.23.1-.1.19-.2.23-.29.1-.19.14-.42.2-.66v-.33l-.15-.1z"/></svg>
			</span>
				<a href="https://wa.me/<?php echo esc_html( $this->sanitize_number( $whatsapp ) ); ?>"
				   class="header-contact-label"
				   title="Позвонить в WhatsApp"><?php echo esc_html( $whatsapp ); ?></a>
			</div>


		</div>
		<?php
	}


	/**
	 * Шорткод вывода контактных данных в подвале
	 */
	public function footer_content( $atts ) {

		$atts = shortcode_atts(
			[
				'address'   => '',
				'logo_link' => '',
				'phone'     => '',
				'whatsapp'  => '',
				'telegram'  => '',
				'mail'      => '',
				'follow'    => '',
			],
			$atts
		);

		$address   = $atts['address'] ?? '';
		$logo_link = $atts['logo_link'] ?? '';
		$phone     = $atts['phone'] ?? '';
		$whatsapp  = $atts['whatsapp'] ?? '';
		$telegram  = $atts['telegram'] ?? '';
		$mail      = $atts['mail'] ?? '';
		$follow    = $atts['follow'] ?? '';

		?>
		<style>
			.footer-contact {
				display: flex;
				flex-direction: column;
			}

			.footer-contact .footer-contact-item {
				display: flex;
				align-items: center;
				margin-bottom: 15px;
			}

			.footer-contact .footer-contact-label {
				font-size: 16px;
				line-height: 1.2;
				margin-left: 10px;
			}

			.footer-contact .footer-contact-icon {
				width: 30px;
				height: 30px;
			}

			.footer-contact .footer-contact-follow .footer-contact-label {
				font-weight: bold;
			}

			.footer-contact .footer-contact-follow .footer-contact-icon {
				width: 48px;
				height: 48px;
			}
		</style>
		<div class="footer-contact">
			<?php if ( $logo_link ): ?>
				<div class="footer-contact-item footer-contact-logo">
					<img src="<?php echo esc_url( $logo_link ) ?>" class="footer-logo" alt="Vǎrman">
				</div>
			<?php endif; ?>
			<?php if ( $address ): ?>
				<div class="footer-contact-item footer-contact-address">
				<span class="footer-contact-icon">
	<svg width="30" height="30" fill="none"><defs/><path fill="url(#paint0_linear)" d="M30 15a15 15 0 11-30 0 15 15 0 0130 0z"/><path fill="#fff"
	                                                                                                                                  d="M6.56 12.73v-.22a6.38 6.38 0 0112.71-.63l1.55 1.41.03-.56v-.22a7.92 7.92 0 00-15.83 0v.22c0 2.2 1.26 4.78 3.76 7.64a32.5 32.5 0 003.67 3.59l.48.39v-2c-1.56-1.38-6.37-5.9-6.37-9.62zM17.68 18.92H20v2.31h-2.32v-2.31z"/><path
			fill="#fff"
			d="M9.54 12.5a3.4 3.4 0 106.79 0 3.4 3.4 0 00-6.79 0zm5.02 0a1.63 1.63 0 11-3.26 0 1.63 1.63 0 013.26 0zM24.98 19.04l-6.16-5.63-6.16 5.63 1.18 1.3.33-.31v2.24c0 1.21 1 2.2 2.2 2.2h4.9a2.2 2.2 0 002.2-2.2v-2.24l.33.3 1.18-1.3zm-3.27 3.23c0 .24-.2.44-.45.44h-4.89a.44.44 0 01-.44-.44v-3.84l2.89-2.64 2.89 2.64v3.84z"/><defs><linearGradient
				id="paint0_linear"
				x1="0"
				x2="30"
				y1="15"
				y2="15"
				gradientUnits="userSpaceOnUse"><stop stop-color="#00F38D"/><stop offset="1" stop-color="#009EFF"/></linearGradient></defs></svg>
				</span>
					<span class="footer-contact-label"><?php echo esc_html( $address ); ?></span>
				</div>
			<?php endif; ?>
			<?php if ( $phone ): ?>
				<div class="footer-contact-item footer-contact-phone">
				<span class="footer-contact-icon">
					<svg width="30" height="30" fill="none"><defs/><path fill="#2196F3" d="M15 30a15 15 0 100-30 15 15 0 000 30z"/>
					<path fill="#FAFAFA"
					      d="M22.5 18.1c-1.62 0-3.16-.35-4.58-1.05a.95.95 0 00-1.26.43l-.68 1.4a13.2 13.2 0 01-4.87-4.86l1.4-.68a.94.94 0 00.44-1.26A10.32 10.32 0 0111.9 7.5a.94.94 0 00-.94-.94H7.5a.94.94 0 00-.94.94c0 8.79 7.15 15.94 15.94 15.94.52 0 .94-.42.94-.94v-3.46a.94.94 0 00-.94-.94z"/></svg>
				</span>
					<a href="tel:<?php echo esc_attr( $this->sanitize_number( $phone ) ); ?>"
					   class="footer-contact-label">
						<?php echo esc_html( $phone ); ?>
					</a>
				</div>
			<?php endif; ?>
			<?php if ( $telegram ): ?>
				<div class="footer-contact-item footer-contact-telegram">
					<span class="footer-contact-icon">
						<svg width="30" height="31" fill="none"><defs/><rect width="30" height="30" y=".68" fill="#419FD9" rx="15"/><path fill="#fff"
						                                                                                                                  d="M6.74 15.35c4.36-1.94 7.27-3.22 8.73-3.84 4.15-1.77 5.02-2.07 5.58-2.08.12 0 .4.03.58.18.15.12.2.3.21.41.02.12.05.39.03.6-.23 2.42-1.2 8.28-1.7 10.98-.2 1.15-.62 1.53-1.02 1.57-.87.08-1.53-.59-2.37-1.15-1.32-.88-2.06-1.43-3.34-2.29-1.48-1-.52-1.54.32-2.43.22-.24 4.05-3.8 4.13-4.11 0-.04.01-.2-.07-.27-.1-.08-.22-.06-.31-.03-.14.03-2.24 1.45-6.32 4.25a2.8 2.8 0 01-1.62.62 10.5 10.5 0 01-2.32-.57c-.94-.3-1.69-.47-1.62-1 .03-.27.4-.56 1.11-.84z"/></svg>
					</span>
					<a href="https://t.me/<?php echo esc_attr( $this->sanitize_number( $telegram ) ); ?>"
					   class="footer-contact-label"
					   title="Позвонить в Telegram">
						<?php echo esc_html( $telegram ); ?></a>
				</div>
			<?php endif; ?>
			<?php if ( $whatsapp ): ?>
				<div class="footer-contact-item footer-contact-whatsapp">
				<span class="footer-contact-icon">
					<svg width="30" height="30" fill="none"><defs/><rect width="30" height="30" fill="#0DC143" rx="15"/><path fill="#fff"
					                                                                                                          d="M21.72 8.26A8.64 8.64 0 006.96 14.4c0 1.5.43 2.98 1.14 4.3l-1.23 4.5 4.59-1.19c1.27.71 2.7 1.04 4.11 1.04a8.7 8.7 0 006.15-14.8zm-6.1 13.33a7.03 7.03 0 01-3.64-.99l-.29-.14-2.74.7.7-2.69-.18-.28a7.16 7.16 0 012.32-9.89 7.15 7.15 0 019.88 2.32 7.15 7.15 0 01-2.32 9.89 6.9 6.9 0 01-3.73 1.08zm4.16-5.25l-.52-.23s-.76-.33-1.23-.57c-.05 0-.1-.05-.14-.05a.68.68 0 00-.33.1l-.71.8a.26.26 0 01-.24.14h-.05a.36.36 0 01-.19-.09l-.23-.1a4.6 4.6 0 01-1.37-.9c-.1-.09-.24-.18-.33-.28a5.28 5.28 0 01-.9-1.13l-.05-.1c-.05-.04-.05-.1-.1-.19 0-.1 0-.19.05-.23l.33-.38c.1-.1.15-.24.24-.33.1-.14.14-.33.1-.48-.05-.23-.62-1.5-.76-1.8a.55.55 0 00-.33-.23h-.52c-.1 0-.2.05-.29.05l-.04.05c-.1.04-.2.14-.29.18-.1.1-.14.2-.24.29a2.41 2.41 0 00-.28 2.55l.05.14c.42.9 1 1.7 1.75 2.42l.19.19c.14.14.28.23.38.37.99.86 2.12 1.47 3.4 1.8.14.05.33.05.47.1h.48c.23 0 .52-.1.7-.2.15-.09.24-.09.34-.18l.1-.1c.09-.1.18-.14.28-.23.1-.1.19-.2.23-.29.1-.19.14-.42.2-.66v-.33l-.15-.1z"/></svg>
				</span>
					<a href="https://wa.me/<?php echo esc_attr( $this->sanitize_number( $whatsapp ) ); ?>"
					   class="footer-contact-label"
					   title="Позвонить в WhatsApp">
						<?php echo esc_html( $whatsapp ); ?></a>
				</div>
			<?php endif; ?>
			<?php if ( $mail ): ?>
				<div class="footer-contact-item footer-contact-mail">
				<span class="footer-contact-icon">
					<svg width="30" height="30" fill="none"><defs/><rect width="30" height="30" fill="#D93025" rx="15"/><g fill="#fff"><path d="M23.44 8.13H6.56l.63 13.59H22.8l.63-13.6z"
					                                                                                                                         opacity=".3"/><path d="M23.44 8.13H6.56l7.78 5.8h1.44l7.66-5.8z"
					                                                                                                                                             opacity=".3"/><path
								d="M7.97 21.72L15 15.39l7.03 6.33H7.97z"
								opacity=".1"/><g
								fill-rule="evenodd"
								clip-rule="evenodd"><path d="M7.97 9.3a1.17 1.17 0 10-2.34 0V20.3c0 .78.63 1.4 1.4 1.4h.94V9.3zM22.03 9.3a1.17 1.17 0 112.34 0V20.3c0 .78-.62 1.4-1.4 1.4h-.94V9.3z"/><path
									d="M6.21 10.31a1.17 1.17 0 01-.43-1.6 1.17 1.17 0 011.6-.43l7.62 4.4 7.62-4.4a1.17 1.17 0 011.6.43 1.17 1.17 0 01-.43 1.6l-6.45 3.72L15 15.4l-2.34-1.36-6.45-3.72z"/></g></g></svg>
				</span>
					<a
						href="mailto:<?php echo esc_html( $mail ); ?>"
						class="footer-contact-label">
						<?php echo esc_html( $mail ); ?>
					</a>
				</div>
			<?php endif; ?>
			<?php if ( $follow ): ?>
				<div class="footer-contact-item footer-contact-follow">
				<span class="footer-contact-icon">
	<svg width="48" height="48" fill="none"><defs/><rect width="48" height="48" fill="#262626" rx="24"/><path fill="#fff"
	                                                                                                          d="M19 24a5 5 0 1110 0 5 5 0 01-10 0zm-2.7 0a7.7 7.7 0 1015.4 0 7.7 7.7 0 00-15.4 0zm13.9-8a1.8 1.8 0 101.8-1.8 1.8 1.8 0 00-1.8 1.8zM17.95 36.2a8.3 8.3 0 01-2.79-.52c-.7-.27-1.2-.6-1.72-1.12a4.63 4.63 0 01-1.12-1.72 8.28 8.28 0 01-.52-2.79c-.07-1.58-.09-2.05-.09-6.06 0-4 .02-4.48.1-6.06.06-1.46.3-2.26.5-2.79.28-.7.6-1.2 1.13-1.72a4.62 4.62 0 011.72-1.12c.53-.21 1.33-.45 2.8-.52 1.57-.07 2.05-.09 6.05-.09s4.48.02 6.06.09c1.46.07 2.26.31 2.79.52.7.27 1.2.6 1.72 1.12.53.52.85 1.02 1.13 1.72.2.53.44 1.33.51 2.79.07 1.58.09 2.05.09 6.06 0 4-.02 4.48-.09 6.06a8.32 8.32 0 01-.51 2.79c-.28.7-.6 1.2-1.13 1.72-.52.53-1.02.85-1.72 1.12-.53.21-1.33.45-2.79.52-1.58.07-2.05.09-6.06.09-4 0-4.48-.02-6.06-.09zm-.12-27.12a11 11 0 00-3.64.7c-1 .38-1.83.9-2.66 1.73a7.33 7.33 0 00-1.73 2.65 11 11 0 00-.7 3.65C9.02 19.42 9 19.92 9 24c0 4.07.02 4.58.1 6.18a11 11 0 00.69 3.65c.38.98.9 1.82 1.73 2.65a7.38 7.38 0 002.66 1.73c.95.37 2.04.63 3.64.7 1.6.07 2.1.09 6.18.09 4.07 0 4.59-.02 6.18-.1a11 11 0 003.65-.69c.98-.38 1.82-.9 2.65-1.73a7.35 7.35 0 001.73-2.65c.37-.96.63-2.05.7-3.65.07-1.6.09-2.1.09-6.18 0-4.07-.02-4.58-.09-6.18a11 11 0 00-.7-3.65 7.38 7.38 0 00-1.73-2.65 7.34 7.34 0 00-2.65-1.73c-.96-.37-2.05-.63-3.64-.7C28.59 9.02 28.08 9 24 9c-4.07 0-4.58.02-6.18.1z"/></svg>
				</span>
					<a href="<?php echo esc_url( $follow ); ?>" class="footer-contact-label">Следите за нами в Instagram</a>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}

}

( new Shortcodes() )->setup_hooks();