ALTER TABLE `assessments` ADD `type` ENUM('pre','post') NULL DEFAULT NULL AFTER `module_id`;
