<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller {
    /**
     * Migration Class Docs: http://ellislab.com/codeigniter/user-guide/libraries/migration.html
     *
     * To use from the command line: php index.php migrate latest
     */

    public function __construct()
    {
        parent::__construct();

        // this controller can only be run from the command line
        if ($this->input->is_cli_request() == FALSE) {
            show_404();
        }

        $this->load->library('migration');
    }

    /**
     *  Run up to the latest migration
     */
    public function latest()
    {
        $this->migration->latest();
        echo $this->migration->error_string();
    }

    /**
     *  Reset migrations to 0
     */
    public function reset()
    {
        $this->migration->version(0);
    }

    /**
     *  Run migration to the specified migration greater than 0
     *
     *  @param int $version The version number of the migration to set as current
     */
    public function version($version = 0)
    {
        $version = (int) $version;
        if($version == 0){
            die('You need to pass a version greater than zero.') . PHP_EOL;
        }
        $this->migration->version($version);
    }
}
/* End of file migrate.php */
/* Location: ./application/controllers/migrate.php */