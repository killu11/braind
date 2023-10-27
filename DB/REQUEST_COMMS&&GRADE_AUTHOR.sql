-- Запрос для получения всех оценок и комментариев нужного нам автора
SELECT content AS comm, Rating_id_rating as grade FROM UserComms
JOIN Comment ON Comment.id_comment = Usercomms.id_comment
JOIN User ON User.id_user = UserComms.id_user 
JOIN authorswithratingpublications AS AWP ON AWP.id_user = User.id_user
WHERE is_auhtor = 1 AND login = 'миша22'