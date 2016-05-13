DROP TABLE IF EXISTS `#__coolcineplan_movies`;
DROP TABLE IF EXISTS `#__coolcineplan_showings`;
DROP TABLE IF EXISTS `#__coolcineplan_showtypes`;
DROP TABLE IF EXISTS `#__coolcineplan_auditoriums`;
DROP TABLE IF EXISTS `#__coolcineplan_reservations`;
DROP TABLE IF EXISTS `#__coolcineplan_users`;

DELETE FROM `#__content_types` WHERE (type_alias LIKE 'com_coolcineplan.%');
