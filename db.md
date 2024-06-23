Tables in the database:


Table: admin
+----------+--------------+--------+-------+-----------+----------------+
| Field    | Type         | Null   | Key   | Default   | Extra          |
|----------+--------------+--------+-------+-----------+----------------|
| admin_id | int          | NO     | PRI   |           | auto_increment |
| username | varchar(127) | NO     | UNI   |           |                |
| password | varchar(255) | NO     |       |           |                |
| fname    | varchar(127) | NO     |       |           |                |
| lname    | varchar(127) | NO     |       |           |                |
+----------+--------------+--------+-------+-----------+----------------+


Table: class
+----------+--------+--------+-------+-----------+----------------+
| Field    | Type   | Null   | Key   | Default   | Extra          |
|----------+--------+--------+-------+-----------+----------------|
| class_id | int    | NO     | PRI   |           | auto_increment |
| semester | int    | NO     |       |           |                |
| section  | int    | NO     |       |           |                |
+----------+--------+--------+-------+-----------+----------------+


Table: message
+------------------+--------------+--------+-------+-------------------+-------------------+
| Field            | Type         | Null   | Key   | Default           | Extra             |
|------------------+--------------+--------+-------+-------------------+-------------------|
| message_id       | int          | NO     | PRI   |                   | auto_increment    |
| sender_full_name | varchar(100) | NO     |       |                   |                   |
| sender_email     | varchar(255) | NO     |       |                   |                   |
| message          | text         | NO     |       |                   |                   |
| date_time        | datetime     | NO     |       | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
+------------------+--------------+--------+-------+-------------------+-------------------+


Table: registrar_office
+-----------------+--------------+--------+-------+-------------------+-------------------+
| Field           | Type         | Null   | Key   | Default           | Extra             |
|-----------------+--------------+--------+-------+-------------------+-------------------|
| r_user_id       | int          | NO     | PRI   |                   | auto_increment    |
| username        | varchar(127) | NO     |       |                   |                   |
| password        | varchar(255) | NO     |       |                   |                   |
| fname           | varchar(31)  | NO     |       |                   |                   |
| lname           | varchar(31)  | NO     |       |                   |                   |
| address         | varchar(31)  | NO     |       |                   |                   |
| employee_number | int          | NO     |       |                   |                   |
| date_of_birth   | date         | NO     |       |                   |                   |
| phone_number    | varchar(31)  | NO     |       |                   |                   |
| qualification   | varchar(31)  | NO     |       |                   |                   |
| gender          | varchar(7)   | NO     |       |                   |                   |
| email_address   | varchar(255) | NO     |       |                   |                   |
| date_of_joined  | datetime     | NO     |       | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
+-----------------+--------------+--------+-------+-------------------+-------------------+


Table: section
+------------+------------+--------+-------+-----------+----------------+
| Field      | Type       | Null   | Key   | Default   | Extra          |
|------------+------------+--------+-------+-----------+----------------|
| section_id | int        | NO     | PRI   |           | auto_increment |
| section    | varchar(7) | NO     |       |           |                |
+------------+------------+--------+-------+-----------+----------------+


Table: semester
+---------------+-------------+--------+-------+-----------+----------------+
| Field         | Type        | Null   | Key   | Default   | Extra          |
|---------------+-------------+--------+-------+-----------+----------------|
| semester_id   | int         | NO     | PRI   |           | auto_increment |
| semester      | varchar(31) | NO     |       |           |                |
| semester_code | varchar(7)  | NO     |       |           |                |
+---------------+-------------+--------+-------+-----------+----------------+


Table: setting
+------------------+--------------+--------+-------+-----------+----------------+
| Field            | Type         | Null   | Key   | Default   | Extra          |
|------------------+--------------+--------+-------+-----------+----------------|
| id               | int          | NO     | PRI   |           | auto_increment |
| current_year     | int          | NO     |       |           |                |
| current_semester | varchar(11)  | NO     |       |           |                |
| college_name     | varchar(100) | NO     |       |           |                |
| slogan           | varchar(300) | NO     |       |           |                |
| about            | text         | NO     |       |           |                |
+------------------+--------------+--------+-------+-----------+----------------+


Table: student_score
+------------+--------------+--------+-------+-----------+----------------+
| Field      | Type         | Null   | Key   | Default   | Extra          |
|------------+--------------+--------+-------+-----------+----------------|
| id         | int          | NO     | PRI   |           | auto_increment |
| semester   | varchar(100) | NO     |       |           |                |
| year       | int          | NO     |       |           |                |
| student_id | int          | NO     |       |           |                |
| teacher_id | int          | NO     |       |           |                |
| subject_id | int          | NO     |       |           |                |
| results    | varchar(512) | NO     |       |           |                |
+------------+--------------+--------+-------+-----------+----------------+


Table: students
+---------------------+--------------+--------+-------+-------------------+-------------------+
| Field               | Type         | Null   | Key   | Default           | Extra             |
|---------------------+--------------+--------+-------+-------------------+-------------------|
| student_id          | int          | NO     | PRI   |                   | auto_increment    |
| username            | varchar(127) | NO     | UNI   |                   |                   |
| password            | varchar(255) | NO     |       |                   |                   |
| fname               | varchar(127) | NO     |       |                   |                   |
| lname               | varchar(255) | NO     |       |                   |                   |
| semester            | int          | NO     |       |                   |                   |
| section             | int          | NO     |       |                   |                   |
| address             | varchar(31)  | NO     |       |                   |                   |
| gender              | varchar(7)   | NO     |       |                   |                   |
| email_address       | varchar(255) | NO     |       |                   |                   |
| date_of_birth       | date         | NO     |       |                   |                   |
| date_of_joined      | timestamp    | YES    |       | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
| parent_fname        | varchar(127) | NO     |       |                   |                   |
| parent_lname        | varchar(127) | NO     |       |                   |                   |
| parent_phone_number | varchar(31)  | NO     |       |                   |                   |
+---------------------+--------------+--------+-------+-------------------+-------------------+


Table: subjects
+--------------+-------------+--------+-------+-----------+----------------+
| Field        | Type        | Null   | Key   | Default   | Extra          |
|--------------+-------------+--------+-------+-----------+----------------|
| subject_id   | int         | NO     | PRI   |           | auto_increment |
| subject      | varchar(31) | NO     |       |           |                |
| subject_code | varchar(31) | NO     |       |           |                |
| semester     | int         | NO     |       |           |                |
+--------------+-------------+--------+-------+-----------+----------------+


Table: teachers
+-----------------+--------------+--------+-------+-------------------+-------------------+
| Field           | Type         | Null   | Key   | Default           | Extra             |
|-----------------+--------------+--------+-------+-------------------+-------------------|
| teacher_id      | int          | NO     | PRI   |                   | auto_increment    |
| username        | varchar(127) | NO     | UNI   |                   |                   |
| password        | varchar(255) | NO     |       |                   |                   |
| class           | varchar(31)  | NO     |       |                   |                   |
| fname           | varchar(127) | NO     |       |                   |                   |
| lname           | varchar(127) | NO     |       |                   |                   |
| subjects        | varchar(31)  | NO     |       |                   |                   |
| address         | varchar(31)  | NO     |       |                   |                   |
| employee_number | int          | NO     |       |                   |                   |
| date_of_birth   | date         | YES    |       |                   |                   |
| phone_number    | varchar(31)  | NO     |       |                   |                   |
| qualification   | varchar(127) | NO     |       |                   |                   |
| gender          | varchar(7)   | NO     |       |                   |                   |
| email_address   | varchar(255) | NO     |       |                   |                   |
| date_of_joined  | datetime     | NO     |       | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
+-----------------+--------------+--------+-------+-------------------+-------------------+