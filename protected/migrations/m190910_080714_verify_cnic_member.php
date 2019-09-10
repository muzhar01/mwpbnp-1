<?php

class m190910_080714_verify_cnic_member extends CDbMigration
{
    public function up()
    {
        $this->execute("ALTER TABLE `members` ADD `verify_cnic` tinyint(1) NOT NULL AFTER `verify_email`;");
        $this->execute("ALTER TABLE `members` ADD `verify_company_ntn` tinyint(1) NOT NULL AFTER `verify_cnic`;");
        $this->execute("ALTER TABLE `members` ADD `verify_company_gst` tinyint(1) NOT NULL AFTER `verify_company_ntn`;");



    }

    public function down()
    {
        $this->execute("ALTER TABLE `members` DROP `verify_cnic`;");
        $this->execute("ALTER TABLE `members` DROP `verify_company_ntn`;");
        $this->execute("ALTER TABLE `members` DROP `verify_company_gst`;");
        return false;
    }

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}