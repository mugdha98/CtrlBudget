Hello there!!

Project Objective :-
	My Project is a simple expense manager website that can be used by all , for tracking their expenses accordingly.
	The website can be used to plan out the expenses for a group of people.
	The user can add the 'Initial Budget' for the expenses and give it a title accordingly.
	Further, the user can also add bills under the given budget and track their expenses accordingly.

This website was built using HTML, CSS, Bootstrap, MySQL, and PHP.

My backend part was done using PhpMyAdmin.

The name of the website is Ct₹l Budget.

The website contains the following page:
 1. Index Page
 2. About Us 
 3. Sign Up
 4. Login
 5. Homepage
 6. Add New Plan
 7. View Plan
 8. Add New Expense
 9. Expense Distribution
10. Change Password

Steps required to run the Expense Manager project:-
1. Import expense_manager.sql in your PhpMyAdmin.
2. Open the Expense_Manager in netbeans or any other IDE.
3. Run the project (usually preffered index.php file) in the browser.
4. The opening page of website will be index.php where the header is a collapsing navbar(responsive) containing aboutus,signup and login page.
5. New users can register themselves using the 'Sign Up' form while existing users can login through 'Login' page.
6. The AboutUs page will contain the information about the website regarding 'Who are we','Why choose us' And 'Contact Us'.
7. The user can click on the navbar-brand to get to the index page. 
8. The index page contain a Start Today button which will redirect the user to login page if user is not logged in else will redirect it to the homepage.
9. If the user have no prior plan then the homepage will show a panel with 'Create a New Plan' 
	otherwise it will show all the added Budget Plans with an icon in the bottom to add further new plans i.e it will redirect to create_new_plan page.
10. On clicking on the 'Create New Plan' the user will be redirected to next page where the user have to enter the Initial Budget and People he want to add in this budget plan.
11. After the user has given the data the page will redirect him to 'Plan Details Page' where the user is asked for more detail about the Budget Plan like title,date and name of the person in this budget plan.
12. Clicking on the submit button will take the user to homepage where his budget plan will be displayed.
13. If the user click on the view plan of a particular budget present in the homepage then it will take the user to 'View Plan Page'.
14. The view plan initially contains three sections:
	i.	The first section gives brief description of the Plan like Budget, Remaining Amount and Date.
	ii.	The second section has a button of Expense Distribution.
	iii.	The third section contains a panel of 'Add New Expense'
15. The Expense Distribution page will show the user the following things:
	
i.	Initial Budget
	ii.	Individual expense made by the people in that budget plan.
	iii.	Total amount spent
	iv.	Remaining Amount
	v.	Individual Shares as a whole
	vi.	Individual Shares of the each person whether they owe money or gets back money.
	vii.	Go back button which will take the user back to View Plan Page.
16. The Add New Expense form contain the following options:
	i.	Title
	ii.	Date of expense 
	iii.	Amount Spent
	iv.	Choose option for the person who made the transaction.
	v.	Upload Bill where the user can upload the bill of the transaction.(optional)
	After the person has added the expense the View Plan Page will contain another section called Expense Card where all these individual expenses are shown.
17. The Expense Card has the following part:
	i.	Expense Name
	ii.	Amount spent
	iii.	Name of the person who paid
	iv.	Date of Transaction
	v. 	Show bill (if bill was uploaded) or You don't have bill(if bill was not uploaded)
18. The show bill will redirect the user to another page where his bill will be shown. 
19. And lastly, The Change Password Page where the user can change his password.

I hope you will like the website.
That's All! 
Thank You!!