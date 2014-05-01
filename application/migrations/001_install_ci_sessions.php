<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_ci_sessions extends CI_Migration {
    public function up()
    {
        $this->dbforge->drop_table('ci_sessions');
        $this->dbforge->add_field(array(
            'session_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'default' => 0
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '45',
                'default' => 0
            ),
            'user_agent' => array(
                'type' => 'VARCHAR',
                'constraint' => '120'
            ),
            'last_activity' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => TRUE,
                'default' => 0
            ),
            'user_data' => array(
                'type' => 'TEXT'
            )
        ));
        $this->dbforge->add_key('session_id', TRUE);
        $this->dbforge->create_table('ci_sessions');
    }

    public function down()
    {
        $this->dbforge->drop_table('ci_sessions');
    }
}
/* End of file migrate.php */
/* Location: ./application/migrations/001_install_ci_sessions.php */