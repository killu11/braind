-- Триггер для проверки авторизации пользователя, если не было введено какое-то поле, пользователь становится автоматически неавторизованным и ему прикрепляется псевдоним
DELIMITER //
CREATE TRIGGER not_authorized
BEFORE INSERT ON user FOR EACH ROW
 BEGIN
    DECLARE rand_num varchar(20);
    SET rand_num = (FLOOR(RAND()*(10000-1000)+1000));
 IF (NEW.pass IS NULL OR NEW.login IS NULL OR NEW.email IS NULL) THEN 
  SET NEW.login = CONCAT('Annonymus', rand_num), NEW.email = NULL, NEW.pass = NULL, NEW.is_auhtor = 0;
    END IF;
END;