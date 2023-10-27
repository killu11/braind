-- Неполное заполнение бд для проверки запроса 
INSERT INTO Comment (id_comment,content,date)
VALUE (2, 'я пажилой боров3', '2017-03-30 22:00:21'),
	  (3, 'я пажилой боров2', '2019-03-30 19:00:00');

INSERT INTO User (id_user,login,email,pass,is_auhtor)
VALUES (2,'миша22', 'misha22@gmail.com', 'provoda', 1),
	   (3,'КИРИЛЛ33', 'киря33@mail.ru', 'silapradva33', 0);

INSERT INTO Usercomms (id_user,id_comment)
VALUES (2,1),
	   (2,2),
       (3,3);
       
INSERT INTO `mydb`.`Rating` (`id_rating`, `grade`) VALUES
(4, 4),
(5, 5),
(6, 6),
(7, 7 ),
(8, 8),
(9, 9),
(10, 10);

INSERT INTO `mydb`.`Chapter` (`id_chapter`, `name_chapter`, `id_subchapter`) VALUES
(1, 'Chapter 1', NULL),
(2, 'Chapter 2', NULL),
(3, 'Subchapter 1', 1),
(4, 'Subchapter 2', 1),
(5, 'Subchapter 3', 2),
(6, 'Subchapter 4', 2);

INSERT INTO `mydb`.`Publications` 
(`id_publications`, `title`, `announcement`, `content`, `Chapter_id_chapter`) 
VALUES
(1, 'Заголовок публикации 1', 'Анонс публикации 1', 'Содержание публикации 1', 1),
(2, 'Заголовок публикации 2', 'Анонс публикации 2', 'Содержание публикации 2', 1),
(3, 'Заголовок публикации 3', 'Анонс публикации 3', 'Содержание публикации 3', 2);

INSERT INTO authorswithratingpublications (id_user,id_publications,Rating_id_rating)
VALUES (2, 3, 9);

		
