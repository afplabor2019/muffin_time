# Requirement specification

### Desired system

We were requested to develop a webshop for a confectionery in order to make orders and choosing from their supplies easier. The system will be written in **C#** programming language as a **WPF** application using **MVVM** design pattern. Browsing the webshop is available without registration but to make an order it is a must to be logged in.

### Required functions list

| Module   | ID   | Name          | Description                                                  |
| -------- | ---- | ------------- | ------------------------------------------------------------ |
| Backend  | F1   | Database      | Database stores all the data that is used by this application. Supplies, orders, users. |
| Frontend | F2   | Login page    | A page which contains a fillable form in order to log in.    |
| Frontend | F2   | Register page | A page which contains a fillable form in order to make a registration. |
| Frontend | F3   | Main page     | Landing page. By default it lists all the available supplies from the database. |
| Frontend | F4   | Cart page     | On this page the users can manage their items in the cart (delete, quantity). From here they can proceed their order. |

### Dictionary

- bug: it is an error in the software which causes it to produce an incorrect or unexpected result
- backend: data access layer in the software
- frontend: interface between the user and the backend
- client: software that accesses the service