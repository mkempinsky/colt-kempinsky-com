<?php
/*
** Customizer Controls
*/
if (class_exists('WP_Customize_Control')) {
    class Adviso_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'adviso' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

if ( class_exists('WP_Customize_Control') && class_exists('woocommerce') ) {
    class WP_Customize_Product_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'adviso' ),
                    'option_none_value' => '0',
                    'taxonomy'          => 'product_cat',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

if (class_exists('WP_Customize_Control')) {
    class Adviso_WP_Customize_Upgrade_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            printf(
                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $this->description
            );
        }
    }
    
    class Adviso_Plus_Upsell_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
	        ?>
	        <a href="https://www.inkhive.com/product/adviso-plus" class="adviso_button"><?php echo $this->description; ?></a>
			<?php
        }
    }

    class Adviso_Skin_Chooser extends WP_Customize_Control{
        public $type = 'skins';

        public function render_content(){
            ?>

            <span class="customize-control-title">
            <?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
                <span class="description customize-control-description">
            	<?php echo wp_kses_post($this->description); ?>
            </span>
            <?php } ?>

            <?php $name = '_customize-skin-' . $this->id;
            foreach ($this->choices as $key=>$value) { ?>
                <label>
                    <input type="radio" class="custom_skin_control" style="background: <?php echo esc_attr( $key ); ?>"  value="<?php echo esc_attr($value); ?>" <?php $this->link(); ?> name="<?php echo esc_attr( $name ); ?>" <?php checked( $this->value(), $value ); ?>/>
                </label>
            <?php }
        }
    }

}


if( class_exists( 'WP_Customize_Control' ) ):
class Adviso_Switch_Control extends WP_Customize_Control {
	
	
    public $type = 'switch';
    
    
    public $enable_disable = array();
    

    public function __construct($manager, $id, $args = array() ){
        $this->enable_disable = $args['enable_disable'];
        parent::__construct( $manager, $id, $args );
    }

    public function render_content(){
        ?>
        <span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>

        <?php if($this->description){ ?>
            <span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
        <?php } ?>

        <?php
        $switch_class = ($this->value() == 'enable') ? 'switch-enable' : '';
        $enable_disable = $this->enable_disable;
        ?>
        <div class="enable-disable-switch <?php echo esc_attr( $switch_class ); ?>">
            <div class="enable-disable-switch-inner">
                <div class="enable-disable-switch-enabled">
                    <div class="enable-disable-switch-switch"><?php echo esc_html($enable_disable['enable']) ?></div>
                </div>

                <div class="enable-disable-switch-disabled">
                    <div class="enable-disable-switch-switch"><?php echo esc_html($enable_disable['disable']) ?></div>
                </div>
            </div>
        </div>
        <input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
        <?php
    }
}

endif;




/**
 *
 * 	Extending the WP_Customize_Panel Class for nested Panels and Sections
 *
 * 	https://gist.github.com/OriginalEXE/9a6183e09f4cae2f30b006232bb154af
 *
**/

if ( class_exists( 'WP_Customize_Panel' ) ) {

  class Adviso_WP_Customize_Panel extends WP_Customize_Panel {

    public $panel;

    public $type = 'adviso_panel';

    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      return $array;

    }

  }

}


/**
 *
 * 	Extending the WP_Customize_Section Class for nested Panels and Sections
 *
**/

if ( class_exists( 'WP_Customize_Section' ) ) {

  class Adviso_WP_Customize_Section extends WP_Customize_Section {


    public $section;
    

    public $type = 'adviso_section';
    

    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      if ( $this->panel ) {

        $array['customizeAction'] = sprintf( __('Customizing', 'adviso') . ' &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );

      } else {

        $array['customizeAction'] = __('Customizing', 'adviso');

      }

      return $array;

    }

  }

}


if ( class_exists('WP_Customize_Control') ) {
	class Adviso_Font_Size_Control extends WP_Customize_Control {
		
		public $type	=	'font-size';
		
		public function render_content() { ?>
		
			<div class="adviso_font_size_control">
				
			<?php
				if ( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				
				<div class="font-size-buttons">
					<?php foreach ( $this->choices as $key => $value ) { ?>
						<label>
							<input type="radio" data-control="size" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
							<span class="size button" data-value="<?php echo esc_attr( $value ); ?>"><?php echo esc_attr( $value ); ?></span>
						</label>
					<?php } ?>
				</div>
			</div>
		<?php
		}
	}
}

if ( class_exists('WP_Customize_Control') ) {
	class Adviso_Font_Weight_Control extends WP_Customize_Control {
		
		public $type	=	'font-size';
		
		public function render_content() { ?>
		
			<div class="adviso_font_weight_control">
				
			<?php
				if ( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				
				<div class="font-weight-buttons">
					<?php foreach ( $this->choices as $choice ) { ?>
						<label>
							<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $choice ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $choice ), $this->value() ); ?>/>
							<span class="weight weight-<?php echo esc_attr( $choice ); ?>"><?php echo esc_attr( $choice ); ?></span>
						</label>
					<?php } ?>
				</div>
			</div>
		<?php
		}
	}
}


/**
 * Sortable Repeater Custom Control
 *
 * @author Anthony Hortin <http://maddisondesigns.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/maddisondesigns
 */
if (class_exists( 'WP_Customize_Control' ) ) {
	class Adviso_Sorter_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'sorter';
	
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
	      <div class="drag_and_drop_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-drag-and-drop" <?php $this->link(); ?> />
				<ul class="sortable">
					<li class="repeater" data-sorter="feat_posts">
						<div class="repeater-input">Featured Posts</div>
					</li>
					<li class="repeater" data-sorter="feat_posts_car">
						<div class="repeater-input">Featured Posts - Carousel</div>
					</li>
					<li class="repeater" data-sorter="feat_cat">
						<div class="repeater-input">Featured Categories</div>
					</li>
					<li class="repeater" data-sorter="feat_prod">
						<div class="repeater-input">Featured Products</div>
					</li>
					<li class="repeater" data-sorter="feat_prod_car">
						<div class="repeater-input">Featured Products - Carousel</div>
					</li>
				</ul>
				<button type="button" class="sorter_reset button">Reset</div>
			</div>
		<?php
		}
	}
	
	
	
	class Adviso_Image_Radio_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
 		public $type = 'image_radio_button';
		
		/**
		 * Render the control in the customizer
		 */
 		public function render_content() {
 		?>
			<div class="image_radio_button_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>

				<?php foreach ( $this->choices as $key => $value ) { ?>
					<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
						<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" title="<?php echo esc_attr( $value['name'] ); ?>" />
					</label>
				<?php	} ?>
			</div>
 		<?php
 		}
 	}
}