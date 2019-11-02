# Requirement specification

### Desired system

We were requested to develop a webshop for a confectionery in order to place orders and choose from their supplies easier. The system will be written in **C#** programming language as a **WPF** application using **MVVM** design pattern. Browsing the webshop is available without registration but to make an order it is a must to be logged in.

### Expected functioning

The user opens the application. Using several menus they can browse the offers. The customers must register and provide their information that is needed to place an order (name, email address, address, phone number). After that the user places the item(s) in the cart and proceeds to checkout.

### Required functions list

| Module   | ID   | Name          | Description                                                  |
| -------- | ---- | ------------- | ------------------------------------------------------------ |
| Backend  | F1   | Database      | Database stores all the data that is used by this application. Supplies, orders, users. |
| Frontend | F2   | Login page    | A page which contains a fillable form in order to log in.    |
| Frontend | F2   | Register page | A page which contains a fillable form in order to make a registration. |
| Frontend | F3   | Main page     | Landing page. By default it lists all the available supplies from the database. |
| Frontend | F4   | Cart page     | On this page the users can manage their items in the cart (delete, quantity). From here they can proceed their order. |

### Legal basis

- Right of withdrawal without justification changes from 8 days to 14 days.
- 14 days is being counted from the day of receiving the ordered item(s). In case the company does not inform the customers about the "Right of withdrawal" it elongates with 12 months.
- The company must refund the customer within 14 days after getting knowledge of Right of withdrawal is being exercised.
- In case the customer choose more expensive transportation than the cheapest the difference must be paid by the customer.
- The owner of the webshop must ensure that the customer notices its onerous title after the terms and conditions were accepted and the order was placed.

### Dictionary

- bug: it is an error in the software which causes it to produce an incorrect or unexpected result
- backend: data access layer in the software
- frontend: interface between the user and the backend
- client: software that accesses the service