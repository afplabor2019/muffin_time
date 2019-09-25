# Requirement specification

**0. Executive summary:**

Our world is so fast, that even we can not keep up with it. Getting and giving a lot of information, many of them which will be important in the future. These has to be stored somewhere. There are rarely some companies that are using paper-based data storage. These are not the fastest and the most efficient ways (with this amount of information).  Our goal is to make data manipulation to companies the most efficient and easiest.

**1. Description of actualities:**

Currently in the ambient towns and most likely at other points in the country there are companies, which warehouse records or holiday records of the employees are written on papers. First of all this is a problem because it is not efficient, on the other hand if there is an unfortunate event (like fire or other destructive event) there is no chance to recover these important notes. These kind of data could be more easily and safely stored on a database. The modification / deletion can be done on a client.

**2. Pipe dream (?) system:**

Our goal is to make a system that adapts to the goals of a company, and has all the required functions for them. This way the work is much more efficient and easier for the employees. Warehouse records, employee data can be modified and deleted in the final release of the system. The first release only implements the basic configurations and functions that are necessary to set up the system. Functions will be available later on with updates. There will be groups of updates and every group focuses on specific functions.

**3. Legal basis:**

????

**4. Current business processes:**

1. A company (which does not use an electronic system / or wants a newer one) requests us to make the system for them.
2. Currently the company stores all its data on papers but it is very obscure.

**5. Required business processes:**

1. To develop a system, which helps the employees: able to store and give access to important data.
2. Our systems are designed for the company in order to intend the most comfortable usage.
3. One of the employees gets a special training in order to teach the other colleagues how the system works, and shows all the features of the system.

**6. Requirement list:**

***6.1 Functional requirements:***

* *R1: Login:*
  * The website can be used by authenticated users. After successful authentication all of the functions (which are applicable to the user's role) will be available on the website.
* *R2: Reset lost password:*
  * In case the user forgets its password a reset link can be send to the user's email address. The link is valid for only 1 hour.
* *R3: Roles:*
  * It is necessary to differentiate the roles. For example a clerk should not get access to functions that are for its superior. Many roles will be available in the system (for eg. Human Resources, Foreman etc...)
* *R4: Able to manipulate data in the database*
  * The point of the system is to be able to store all kind of data of the company in one database, which can be created, modified, deleted on the website.

***6.2 Non-functional requirements:***

* *R5: Clean design:*
  * The design of the system has to have a clean, easy to use interface. We are trying to make the most comfortable design for our customers.
* *R6: Safety:*
  * Data in the database has to be stored the most secure way it is possible. There has to be no chance to steal any data from the outside.

**7. Guided and free text report**

*Technician:* Please describe what kind of system would you like to have!

*Customer:* We would like to have a software that can store our company's data, and we could track our warehouse stock live.

*Technician:* What does your company deal with exactly?

*Customer:* ...

*Technician:* Do you have any idea what functions shall the application implement? For example (beside the warehouse stock tracking) storing your employees' data and so on?

*Customer:* ...

*Technician:* Great! If there is no restriction on the technology and tools that we can use we will plan a specification which will be redirected to you. Please read it properly if it meets all you needs. If it does we will start working on the system, if not we will need to have additional meetings to make everything accurate.

**8. Dictionary:**

* bug: it is an error in the software which causes it to produce an incorrect or unexpected result
* backend: data access layer in the software
* frontend: interface between the user and the backend
* client: software that accesses the service which runs on a server

