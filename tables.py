import mysql.connector
from tabulate import tabulate

config = {
  'user': 'root',
  'password': '123',
  'host': 'localhost',
  'database': 'cms_db'
}


try:
  f = open("db.md", "w")
  conn = mysql.connector.connect(**config)
  cursor = conn.cursor()

  cursor.execute("SHOW TABLES")

  tables = cursor.fetchall()

  f.write("Tables in the database:")
  for table in tables:
    cursor.execute(f"DESCRIBE {table[0]}")

    desc = cursor.fetchall()

    f.write(f"\n\n\nTable: {table[0]}\n")
    f.write(tabulate(desc, headers=['Field','Type','Null','Key','Default','Extra'], tablefmt='psql'))


finally:
  if cursor:
    cursor.close()
  if conn:
    conn.close()
