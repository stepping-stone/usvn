ALTER TABLE `usvn_groups` CHANGE `groups_id` `groups_id` INT( 11 ) NOT NULL AUTO_INCREMENT ;
ALTER TABLE `usvn_projects` CHANGE `projects_id` `projects_id` INT( 11 ) NOT NULL AUTO_INCREMENT ;
ALTER TABLE `usvn_rights` CHANGE `rights_id` `rights_id` INT( 11 ) NOT NULL AUTO_INCREMENT ;
ALTER TABLE `usvn_users` CHANGE `users_id` `users_id` INT( 11 ) NOT NULL AUTO_INCREMENT ;
ALTER TABLE `usvn_workgroups` CHANGE `workgroups_id` `workgroups_id` INT( 11 ) NOT NULL AUTO_INCREMENT ;ALTER TABLE `usvn_users` CHANGE `users_login` `users_login` VARCHAR(255) NOT NULL UNIQUE;
ALTER TABLE `usvn_groups` CHANGE `groups_name` `groups_name` VARCHAR(150) NOT NULL UNIQUE;
ALTER TABLE `usvn_projects` CHANGE `projects_name` `projects_name` VARCHAR(255) NOT NULL UNIQUE;
ALTER TABLE `usvn_files_rights` CHANGE `files_rights_id` `files_rights_id` INT( 11 ) NOT NULL AUTO_INCREMENT ;
