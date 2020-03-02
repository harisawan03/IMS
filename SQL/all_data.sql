SELECT * FROM it_inventory;
SELECT * FROM employees;
SELECT item, owned, available FROM it_inventory WHERE upc LIKE '123456789012';
SELECT item, owned, available FROM it_inventory WHERE upc LIKE '109876543281';
SELECT * FROM item_tracker;
SELECT * FROM add_remove_log;

SELECT employees.name, item_tracker.action, it_inventory.item, item_tracker.date
FROM item_tracker
INNER JOIN employees ON item_tracker.employee_id = employees.id
INNER JOIN it_inventory ON item_tracker.item_id = it_inventory.id;