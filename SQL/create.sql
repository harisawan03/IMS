CREATE TABLE it_inventory
(
  id INTEGER IDENTITY PRIMARY KEY,
  item VARCHAR(MAX),
  category VARCHAR(MAX),
  owned INTEGER,
  available INTEGER,
  upc VARCHAR(12),
  bin INTEGER
);

CREATE TABLE employees
(
  id INTEGER PRIMARY KEY,
  name VARCHAR(MAX)
);