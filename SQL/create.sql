CREATE TABLE it_inventory
(
  id INTEGER IDENTITY PRIMARY KEY,
  item TEXT,
  category TEXT,
  owned INTEGER,
  available INTEGER,
  upc TEXT,
  bin INTEGER
);

CREATE TABLE employees
(
  id INTEGER PRIMARY KEY,
  name TEXT
);