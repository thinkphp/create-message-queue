Create a Message Queue
----------------------

Using a MySQL table to create a simple message queue for delayed notifications.

Background processing is always a problem in web applications. Users like to get snappy responses from their web pages, but sometimes
processing can take a while. A classic example is web notification mail-out. The users initiates some process that requires mailing
a notice to 100 people, but mailing to 100 people takes a while. Making the server wait for all the mail to go out isn't a good idea.


