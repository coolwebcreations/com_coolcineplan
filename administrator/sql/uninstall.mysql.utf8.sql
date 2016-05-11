DROP TABLE IF EXISTS `#__cineplan_movies`;
DROP TABLE IF EXISTS `#__cineplan_showings`;
DROP TABLE IF EXISTS `#__cineplan_showtypes`;
DROP TABLE IF EXISTS `#__cineplan_auditoriums`;
DROP TABLE IF EXISTS `#__cineplan_reservations`;
DROP TABLE IF EXISTS `#__cineplan_users`;

DELETE FROM `#__content_types` WHERE (type_alias LIKE 'com_coolcineplan.%');