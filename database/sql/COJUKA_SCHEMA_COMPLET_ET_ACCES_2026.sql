-- COJUKA Consulting Group / Installation et mise à niveau du schéma métier
-- MySQL 8 / MariaDB 10.6+ ; choisir la base COJUKA dans phpMyAdmin.
-- Sauvegarde obligatoire. N'efface ni table ni donnée.
-- PRÉREQUIS : la table Laravel users (avec is_group_admin) doit exister.
SET NAMES utf8mb4;
CREATE TABLE IF NOT EXISTS group_entities (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255) NOT NULL,slug VARCHAR(255) NOT NULL UNIQUE,
 type VARCHAR(255) NOT NULL DEFAULT 'filiale',country VARCHAR(255) NULL,
 sector VARCHAR(255) NULL,summary TEXT NULL,description TEXT NULL,website VARCHAR(255) NULL,
 published TINYINT(1) NOT NULL DEFAULT 0,
 created_at TIMESTAMP NULL,updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS group_projects (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 group_entity_id BIGINT UNSIGNED NOT NULL,
 title VARCHAR(255) NOT NULL,category VARCHAR(255) NULL,location VARCHAR(255) NULL,
 status VARCHAR(255) NOT NULL DEFAULT 'planifie',start_date DATE NULL,end_date DATE NULL,
 budget DECIMAL(16,2) NULL,currency VARCHAR(3) NOT NULL DEFAULT 'USD',
 description TEXT NULL,published TINYINT(1) NOT NULL DEFAULT 0,
 created_at TIMESTAMP NULL,updated_at TIMESTAMP NULL,
 INDEX idx_project_entity(group_entity_id),
 CONSTRAINT fk_cojuka_projects_entity FOREIGN KEY(group_entity_id) REFERENCES group_entities(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS group_assets (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 group_entity_id BIGINT UNSIGNED NOT NULL,
 name VARCHAR(255) NOT NULL,kind VARCHAR(255) NOT NULL,
 location VARCHAR(255) NULL,reference VARCHAR(255) NULL,status VARCHAR(255) NOT NULL DEFAULT 'en_etude',
 notes TEXT NULL,created_at TIMESTAMP NULL,updated_at TIMESTAMP NULL,
 INDEX idx_assets_entity(group_entity_id),
 CONSTRAINT fk_cojuka_assets_entity FOREIGN KEY(group_entity_id) REFERENCES group_entities(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS group_suite_records (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 group_entity_id BIGINT UNSIGNED NULL,
 module VARCHAR(40) NOT NULL,title VARCHAR(255) NOT NULL,reference VARCHAR(255) NULL,
 status VARCHAR(40) NOT NULL DEFAULT 'brouillon',record_date DATE NULL,
 amount DECIMAL(18,2) NULL,currency CHAR(3) NOT NULL DEFAULT 'USD',
 location VARCHAR(255) NULL,description TEXT NULL,details JSON NULL,
 created_by BIGINT UNSIGNED NULL,updated_by BIGINT UNSIGNED NULL,
 created_at TIMESTAMP NULL,updated_at TIMESTAMP NULL,
 INDEX idx_suite_module_entity_status(module,group_entity_id,status),
 CONSTRAINT fk_cojuka_suite_entity FOREIGN KEY(group_entity_id) REFERENCES group_entities(id) ON DELETE SET NULL,
 CONSTRAINT fk_cojuka_suite_creator FOREIGN KEY(created_by) REFERENCES users(id) ON DELETE SET NULL,
 CONSTRAINT fk_cojuka_suite_editor FOREIGN KEY(updated_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS group_suite_audit (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 user_id BIGINT UNSIGNED NULL,action VARCHAR(30) NOT NULL,
 module VARCHAR(40) NOT NULL,record_id BIGINT UNSIGNED NOT NULL,
 `before` JSON NULL,`after` JSON NULL,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 INDEX idx_audit_module_record(module,record_id),
 CONSTRAINT fk_cojuka_audit_user FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Contrôles : les tables existantes ne sont pas modifiées automatiquement.
-- Si votre ancien schéma diverge, comparer avant toute migration manuelle.

-- COJUKA / Contrôle d'accès départemental / MySQL 8 et MariaDB
-- IMPORTANT : sélectionner la base COJUKA, sauvegarder AVANT exécution.
-- Ne supprime aucune table, aucun utilisateur ni aucune opération existante.
-- Le SQL seul ne protège pas les routes : déployer le code Laravel associé.
SET NAMES utf8mb4;
CREATE TABLE IF NOT EXISTS group_departments (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 code VARCHAR(50) NOT NULL UNIQUE,
 name VARCHAR(150) NOT NULL,
 active TINYINT(1) NOT NULL DEFAULT 1,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS group_department_permissions (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 department_id BIGINT UNSIGNED NOT NULL,
 module VARCHAR(40) NOT NULL,
 can_view TINYINT(1) NOT NULL DEFAULT 0,
 can_create TINYINT(1) NOT NULL DEFAULT 0,
 can_update TINYINT(1) NOT NULL DEFAULT 0,
 can_delete TINYINT(1) NOT NULL DEFAULT 0,
 can_export TINYINT(1) NOT NULL DEFAULT 0,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 UNIQUE KEY dept_module_unique (department_id,module),
 CONSTRAINT fk_cojuka_department_permissions FOREIGN KEY (department_id) REFERENCES group_departments(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS group_user_entity_access (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 user_id BIGINT UNSIGNED NOT NULL,
 group_entity_id BIGINT UNSIGNED NOT NULL,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 UNIQUE KEY user_entity_unique (user_id,group_entity_id),
 CONSTRAINT fk_cojuka_entity_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
 CONSTRAINT fk_cojuka_entity_group FOREIGN KEY (group_entity_id) REFERENCES group_entities(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Compatibilité MariaDB : la colonne est ajoutée seulement si absente.
SET @has_department_column=(SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='users' AND COLUMN_NAME='group_department_id');
SET @ddl=IF(@has_department_column=0,'ALTER TABLE users ADD COLUMN group_department_id BIGINT UNSIGNED NULL, ADD INDEX idx_users_group_department (group_department_id)','SELECT ''group_department_id existe déjà'' AS status');
PREPARE stmt FROM @ddl; EXECUTE stmt; DEALLOCATE PREPARE stmt;
-- Aucun utilisateur existant n'est affecté automatiquement à un département.
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('direction','Direction générale',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('rh','Ressources humaines',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('finances','Finances et comptabilité',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('juridique','Juridique et contrats',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('achats','Achats et approvisionnements',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('logistique','Logistique et transport',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('immobilier','Immobilier et foncier',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('mines','Mines et concessions',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('consulting','Consultance',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);
INSERT INTO group_departments (code,name,active,created_at,updated_at) VALUES ('projets','Gestion de projets',1,NOW(),NOW()) ON DUPLICATE KEY UPDATE name=VALUES(name);

-- Permissions par défaut : lecture/ajout/modification pour le département concerné.
-- Suppression et export désactivés par défaut. La direction n'obtient pas
-- automatiquement les droits sensibles : seul is_group_admin accède à tout.
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'entites',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'projets',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'actifs',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'rh',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'finances',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'contrats',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'achats',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'logistique',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'immobilier',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'mines',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'consulting',0,0,0,0,0,NOW(),NOW() FROM group_departments WHERE code='direction'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'rh',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='rh'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'finances',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='finances'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'contrats',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='juridique'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'achats',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='achats'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'logistique',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='logistique'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'immobilier',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='immobilier'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'mines',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='mines'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'consulting',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='consulting'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'projets',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='projets'
ON DUPLICATE KEY UPDATE module=VALUES(module);
INSERT INTO group_department_permissions (department_id,module,can_view,can_create,can_update,can_delete,can_export,created_at,updated_at)
SELECT id,'actifs',1,1,1,0,0,NOW(),NOW() FROM group_departments WHERE code='projets'
ON DUPLICATE KEY UPDATE module=VALUES(module);

-- Vérifications à exécuter après installation :
SELECT d.code,d.name,p.module,p.can_view,p.can_create,p.can_update,p.can_delete,p.can_export
FROM group_departments d LEFT JOIN group_department_permissions p ON p.department_id=d.id
ORDER BY d.code,p.module;
SELECT u.id,u.name,u.email,u.is_group_admin,u.group_department_id FROM users u ORDER BY u.id;
-- IMPORTANT : affecter les utilisateurs via l'interface /gestion/utilisateurs.
-- Ne donnez jamais is_group_admin=1 aux employés de département.
