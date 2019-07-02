CREATE TABLE it_inventory (id INTEGER PRIMARY KEY, item TEXT, category TEXT, owned INTEGER, bin INTEGER);
INSERT INTO it_inventory VALUES (1, "13 inch MacBook Pro", "Computer", 4, 1);
INSERT INTO it_inventory VALUES (2, "15 inch MacBook Pro", "Computer", 3, 2);
INSERT INTO it_inventory VALUES (3, "USB-C Adapter", "Adapter", 7, 3);
INSERT INTO it_inventory VALUES (4, "Mouse", "Peripheral", 13, 4);
INSERT INTO it_inventory VALUES (5, "Keyboard", "Peripheral", 21, 5);
INSERT INTO it_inventory VALUES (6, "Ethernet Cable", "Cable", 19, 6);
INSERT INTO it_inventory VALUES (7, "HP Envy", "Computer", 9, 7);
INSERT INTO it_inventory VALUES (8, "11 inch iPad Pro", "Computer", 5, 8);

SELECT item FROM it_inventory WHERE owned < 9 ORDER BY category;