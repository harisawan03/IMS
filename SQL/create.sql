CREATE TABLE it_inventory
(
  id INTEGER IDENTITY PRIMARY KEY,
  item VARCHAR(MAX),
  category VARCHAR(MAX),
  owned INTEGER,
  available INTEGER,
  upc VARCHAR(12) UNIQUE,
  bin INTEGER
);

CREATE TABLE employees
(
  id INTEGER PRIMARY KEY,
  name VARCHAR(MAX)
);

CREATE TABLE item_tracker
(
  id INTEGER IDENTITY PRIMARY KEY,
  action VARCHAR(15),
  date smalldatetime,
  employee_id INTEGER REFERENCES employees(id),
  item_id INTEGER REFERENCES it_inventory(id)
);

CREATE TABLE add_remove_log 
(
  id INTEGER IDENTITY PRIMARY KEY,
  action VARCHAR(10),
  date smalldatetime,
  item_id INTEGER REFERENCES it_inventory(id),
  amount INTEGER,
  reason VARCHAR(MAX)
);