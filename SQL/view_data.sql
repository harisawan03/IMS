SELECT * FROM it_inventory;
SELECT * FROM employees;

SELECT * FROM item_tracker;
SELECT * FROM add_remove_log;

SELECT employees.name, item_tracker.action, it_inventory.item, item_tracker.date
FROM item_tracker
INNER JOIN employees ON item_tracker.employee_id = employees.id
INNER JOIN it_inventory ON item_tracker.item_id = it_inventory.id;

SELECT add_remove_log.amount, it_inventory.item, add_remove_log.action, add_remove_log.date, add_remove_log.reason
FROM add_remove_log
INNER JOIN it_inventory ON add_remove_log.item_id = it_inventory.id;