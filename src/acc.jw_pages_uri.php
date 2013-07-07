<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require PATH_THIRD.'jw_pages_uri/config.php';

/**
 * JW Pages URI
 *
 * @package    jw_pages_uri
 * @author     Jeremy Worboys <jw@jeremyworboys.com>
 * @copyright  Copyright (c) 2013 Jeremy Worboys
 */
class Jw_pages_uri_acc
{
    public $name        = JW_PAGES_URI_NAME;
    public $id          = JW_PAGES_URI_ID;
    public $version     = JW_PAGES_URI_VERSION;
    public $description = 'Adds the functionality of Title URL to Pages URI';
    public $sections    = array();

    // -------------------------------------------------------------------------

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();
    }

    // -------------------------------------------------------------------------

    /**
     * Set Sections
     *
     * Set content for the accessory
     *
     * @access  public
     * @return  void
     */
    public function set_sections()
    {
        // Hide accessory tab
        $this->sections[] = '<script type="text/javascript">$("#accessoryTabs a.jw_pages_uri").parent().remove();</script>';

        // Only add js when publishing a new entry
        if ($this->EE->input->get_post('entry_id') === false && $this->EE->input->get_post('C') === 'content_publish')
        {
            // Load in necessary js files
            $this->EE->cp->add_js_script(array(
                'plugin' => array('ee_url_title')
            ));

            $this->EE->javascript->output('
                $("#pages__pages_uri").val("");

                $("#title").on("keyup keydown change", function() {
                    $(this).ee_url_title("#pages__pages_uri");
                    $("#pages__pages_uri").val("/" + $("#pages__pages_uri").val());
                });
            ');
        }
    }

}
// END CLASS
