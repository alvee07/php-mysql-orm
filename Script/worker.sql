-- CALL `test_db`.`insert_user`('alvee', current_time(), current_date(), 'M', 88888, 1, 0, @out_id);
-- select @out_id;

-- CALL `test_db`.`insert_user`('from mysql', current_time(), current_date(), 'M', 88888, 1, 0);

call select_users();

CALL `test_db`.`filter_user`(99999.00, 1, 0, current_time());
