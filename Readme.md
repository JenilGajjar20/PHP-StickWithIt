# StickWithIt (App Name)

**StickWithIt** is an **_online food ordering website_** created using **PHP**. The database used here is **MYSQL database**. The tool used here for storing the data is **phpMyAdmin**. The main purpose of an online ordering system is to provide customers for a way to place an order at a restaurant over the internet.

Through this site you can create an account by registering yourself. You can also purchase various items, create profile page and add contact number, update the password, increase or decrease the quantity of an item and also remove an item from the cart. This is just a demo website for college project.

# PHP

PHP is a popular general-purpose scripting language that is especially suited to web development.

Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.

With PHP, you can connect to and manipulate databases.

**MySQL** is the most popular database system used with PHP.

# MySQL

- MySQL is a database system used on the **web**
- It is a database system that runs on a **server**
- It is ideal for both **small** and **large** applications
- It is very **fast**, **reliable**, and **easy to use** and uses **standard SQL**
- It compiles on a number of **platforms** and is **free to download**
- MySQL is **developed**, **distributed**, and **supported** by _Oracle Corporation_

The data in a **MySQL database** are stored in tables.
A **_table_** is a collection of related data, and
it consists of columns and rows.

To access MySQL in Windows you need to install the **XAMPP**.

# XAMPP Server

**XAMPP** is a software distribution which provides the Apache web server, MySQL database (actually MariaDB), Php and Perl (as command-line executables and Apache modules) all in one package.

The XAMPP download site which I use is:
[XAMPP Download](https://www.apachefriends.org/download.html)

## PHP functions

Various functions used in the project:

1. **mysqli_query()**: The _query() / mysqli_query()_ function performs a query against a database.
   _Syntax:_

```
Object oriented style:
$mysqli -> mysqli_query(query, resultmode);

Procedural style:
mysqli_query(connection, query, resultmode);
```

2. **mysqli_num_rows()**: The _mysqli_num_rows()_ function returns the number of rows in a result set.
   _Syntax:_

```
mysqli_num_rows(result);
```

3. **mysqli_fetch_assoc()**: The _fetch_assoc() / mysqli_fetch_assoc()_ function fetches a result row as an associative array.
   _Syntax:_

```
Object oriented style:
$mysqli_result -> fetch_assoc();

Procedural style:
mysqli_fetch_assoc(result);
```

4. **isset()**: The _isset()_ function checks whether a variable is set, which means that it has to be declared and is not NULL.
   _Syntax:_

```
isset(variable, ....);
```

5. **move_uploaded_file()**: The _move_uploaded_file()_ function moves an uploaded file to a new destination.
   _Syntax:_

```
move_uploaded_file(file, dest);
```

6. **unset()**: The _unset()_ function unsets a variable.
   _Syntax:_

```
unset(variable, ....);
```

7. **mysqli_connect()**: The _connect() / mysqli_connect()_ function opens a new connection to the MySQL server.
   _Syntax:_

```
Object oriented style:
$mysqli -> new mysqli(host, username, password, dbname, port, socket);

Procedural style:
mysqli_connect(host, username, password, dbname, port, socket);
```
