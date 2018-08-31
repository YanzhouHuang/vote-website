# vote-website
basic website allow user create and vote the poll


Summarize and Requirements
This project allow user to create polls by type a poll question and its choices for each poll, and delete polls he create. Once a poll is created, visitors can select any poll and select an answer to submit. The system is able to save vote, when the vote was submitted. Then displays the current results of the poll through a pie chart, the overall percentage of each answer of the poll, and the total votes for each answers.
We are not allowed to use some google API, and libraries to draw the chart. The results displayed should accurately reflect the total votes collected in the database.

Analysis/Design
This project included index.html, createvote.html, createvote.php, delvote.php, delvotehandle.php, voteindex.php, vote.php and votehandel.php.
	•	Index.html  
It is the user interface. This page display three main function create poll, delete poll, and vote.
	•	Createvote.html
It is a form of the vote, it included title, question, choices. Choices allow to add at least four no more than ten. It also has a hidden field used to record the current number of choices. It provide the basic operation for the createvote.php.
	•	Createvote.php
First Insert the data into vote table, then found the id which the data just insert in vote table. Final, insert voteid into choice table.
	•	 Delvote.php
In the vote table, search the poll which the isdel column is not 1.
Then transmit the id which in the vote table to delvotehandle.php.
	•	Delvotehandle.php
Get the id from the delvote.php. According to this id set the isdel column to 1.
	•	Voteindex.php
This is a page display all the polls.
	•	Vote.php
Use method “request” to get the id for voteindex.php. According to this id, display the poll title, question and all the choices, create a form, and count the votes for each choice.
Based on the count of choice, display the chart. 
	•	Votehandle.php
This is the user select one choice in the voting page, and confirm this vote.

Database design
This project has two tables: one is vote table. Another is choice table. Vote table it includes id, title, text, and isdel.
Id is the number for programmer to get the data. It is auto_increment column. 
Title is the name of the poll.  
Text is the poll question.
Isdel is working for delete poll. If you delete the poll, the isdel will get value 1. And the poll will not display to the user and vaster.


User manual
How to Create a Poll
	•	Click Create Poll (user part) on the index page.
	•	It will display the create vote page. On this page, you can enter title, question, and choices. There is 2 button on the top which is add choice and delete choice. You can add no more than 10 choices and delete not less than 4 choices. When you finish all the field, click the submit button, it will show the confirm window, if you still need to do some change, click cancel, otherwise click ok to submit. 
	•	If you don’t want to finish you creating, click Return to Menu, it will return to index page.
	•	When submit successful, it will automatic return to index page.  
How to Delete a Poll
	•	Click Delete Poll (user part) on the index page.
	•	It will display the delete poll page. On this page, it will display all the polls. If you don’t want one poll. Click the delete button behind the poll, it will show the confirm window, if you still want to keep it, click cancel, otherwise click ok to delete.
	•	If you don’t want to delete the poll, click Return to Menu, it will return to index page.
	•	When delete successful, it will automatic return to index page.
How to vote a poll
	•	Click vote (visit part) on the index page.
	•	It will display the vote index page. On this page, it will display all the polls. You can click one and it will enter the voting page.
	•	If you don’t want to pick one poll, click Return to Menu, it will return to index page.
	•	On the voting page, it will display the title, poll, choices and its counts, the pie chart and the color sheet. When you decide what you want to vote. Click the point behind the choice, then click the submit button, it will show the confirm window, if you still need to decide, click cancel, otherwise click ok to submit.
	•	If you don’t want to vote this poll, click Return to Menu, it will return to index page.
	•	When submit successful, it will automatic return to vote index page.

Bugs/Problems
The pie chart has some issues when I got multiple vote counts. It will show some line.
The percentage part is not working.
Limitations
This Voting Web-Based Database System relies on a MySQL database hosted by an Apache Server to display and update the user's interface. As long as these two resources are running properly, This Voting Web-Based Database System will function well.
Could add the register and login function. User server record the user IP to prevent duplicate vote. 

