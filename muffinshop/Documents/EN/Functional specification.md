# Functional specification

### Executive summary

The goal of this system is to make a webshop for a confectionery in order to place orders and choose from their supplies easier.

### Goals and avoided things:

Our goal is to make an easily maintainable webshop, which has a very clean design, easy to use interface. Currently there is no online platform in connection with this company. We would like to avoid things that is not obvious for the users, and makes things much harder than they should be.

### Pipe-dream system

There should be a searching function which allow users to filter the offers. More than 1 payment option (credit card, cash), and the opportunity to place orders in advance.

### External restriction of the system

There are many things that restrict our system, like applications, laws, orders, rules. In case of an application we shall keep that point in mind that we should fulfil its terms, and there is a deadline till we have to finish the system. We should consider that the money that is consumable on the project has to be shared between the modules that are being programmed. It must not contain anything that is beyond the age limit looking at all countries in the European Union.

### Current business processes

1. No online platform
2. Pay only with cash
3. No delivery, only personal delivery

### Required business processes

1. An easy to use online platform
2. Pay by cash or credit card
3. Home delivery

### List of requirements

| Module   | ID   | Name          | Description                                                  |
| -------- | ---- | ------------- | ------------------------------------------------------------ |
| Backend  | F1   | Database      | Database stores all the data that is used by this application. Supplies, orders, users. |
| Backend  | F2   | Login         | Users can authorize themselves to place orders in the webshop. |
| Backend  | F3   | Register      | Users can register themselves to provide their information in order to place orders in the webshop. |
| Frontend | F4   | Login page    | A page which contains a fillable form in order to log in.    |
| Frontend | F5   | Register page | A page which contains a fillable form in order to make a registration. |
| Frontend | F6   | Main page     | Landing page. By default it lists all the available offers from the database. |
| Frontend | F7   | Cart page     | On this page the users can manage their items in the cart (delete, quantity). From here they can proceed their order. |

### User scenarios

| ID   | Name        | Description                                                  |
| ---- | ----------- | ------------------------------------------------------------ |
| S1   | Login       | Users can login if they were previously registered using their email address and password. |
| S2   | Register    | Users can register themselves on the webshop. There are many information that is needed to register. Full name, username, email address, password, address, phone number |
| S3   | Browse      | On the landing page they can browse the offers that are available. Offers can be filtered by many options to show the user the offers that are interesting. |
| S4   | Manage cart | Every user has a cart. They can add items to the cart that they want to order. In the cart they can manage these items, change the quantity or delete unwanted items from the cart. |
| S5   | Checkout    | After choosing items to order they can checkout. Here they can choose the payment option and the way of delivery. If the user pays by credit card a new window opens where they can fill in their credit card data and the checkout will be processed. |

### Mockups

*work in progress*

### Dictionary

- bug: it is an error in the software which causes it to produce an incorrect or unexpected result
- backend: data access layer in the software
- frontend: interface between the user and the backend
- client: software that accesses the service
- landing page: the main page that loads when the user opens the application