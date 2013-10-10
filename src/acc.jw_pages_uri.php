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
    /**
     * Enter the IDs of each channel you want to enable this for.
     *
     * NOTE: Enabling this for channels that aren't meant to (or don't
     * exclusively) contain pages can cause edge-case issues as all entries
     * from these channels will be added to the pages table.
     */
    private $channel_ids = array();

    // -------------------------------------------------------------------------

    public $name        = JW_PAGES_URI_NAME;
    public $id          = JW_PAGES_URI_ID;
    public $version     = JW_PAGES_URI_VERSION;
    public $description = 'Adds the functionality of Title URL to Pages URI';
    public $sections    = array();

    // -------------------------------------------------------------------------

    /**
     * Constructor
     */
    public function __contruct()
    {
        $config_ids = ee()->config->item(JW_PAGES_URI_ID.'_channel_ids');

        if ($config_ids) {
            $this->config_ids = $config_ids;
        }
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

        // Only add js when publishing a new entry to the `Pages` channel
        if (
            ee()->input->get_post('entry_id') === false
         && in_array(ee()->input->get_post('channel_id'), $this->channel_ids)
         && ee()->input->get_post('C') === 'content_publish'
        ) {
            // Load in necessary js files
            ee()->cp->add_js_script(array(
                'plugin' => array('ee_url_title')
            ));

            ee()->javascript->output('
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
