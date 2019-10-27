# Functional specification

### Description of actualities

The confectionery that requested us to develop this system does not have any kind of online platform neither a database. This makes the operator and the customers life more difficult.

### Pipe-dream system

We were requested to develop a webshop for a confectionery in order to  make orders and choosing from their supplies easier. The system will be  written in **C#** programming language as a **WPF** application using **MVVM** design pattern. Browsing the webshop is available without registration but to place an order it is a must to be logged in. 

### List of required functions

| Module   | ID   | Name          | Description                                                  |
| -------- | ---- | ------------- | ------------------------------------------------------------ |
| Backend  | F1   | Database      | Database stores all the data that is used by this application. Supplies, orders, users. |
| Frontend | F2   | Login page    | A page which contains a fillable form in order to log in.    |
| Frontend | F2   | Register page | A page which contains a fillable form in order to make a registration. |
| Frontend | F3   | Main page     | Landing page. By default it lists all the available supplies from the database. |
| Frontend | F4   | Cart page     | On this page the users can manage their items in the cart (delete, quantity). From here they can proceed their order. |

### Legal basis

1.  Processing shall be lawful only if and to the extent that at least one of the following applies:  

   a)  the data subject has given consent to the processing of his or her personal data for one or more specific purposes; 

   b)  processing is necessary for the performance of a contract to which the  data subject is party or in order to take steps at the request of the  data subject prior to entering into a contract; 

   c)  processing is necessary for compliance with a legal obligation to which the controller is subject; 

   d)  processing is necessary in order to protect the vital interests of the data subject or of another natural person; 

   e) processing is necessary for the performance of a task carried out in the public interest or in the exercise of official authority vested in the  controller; 

   f)  processing is necessary for the purposes of the legitimate interests  pursued by the controller or by a third party, except where such  interests are overridden by the interests or fundamental rights and  freedoms of the data subject which require protection of personal data,  in particular where the data subject is a child. 

With registration the user accepts the terms and conditions.

### Dictionary

- bug: it is an error in the software which causes it to produce an incorrect or unexpected result
- backend: data access layer in the software
- frontend: interface between the user and the backend
- client: software that accesses the service