# AR_R

## Brief
this is the initial Version
front-end and back-end has all been setup except data flow in the backend
the program can run with all the required behavior but it will not generate data for now. 

## Issues
### front-end
- observer_view missing confidence level input page
- setup.php will asks for the basic info like f2f or sidebyside for the experiment; for now setup page can properly record input into sql
and it has been connected to moderator_view.php; after clicked submit button on the setup.php it will automatically jump to moderator_view.
while setup page is working, I haven't debug it yet so it will potentially contains bugs and logic error.

### back-end
*I will add the rest of the functionality later this week. 

- time-stamp functionality hasn't been implemented.
- data generating function hasn't been implemented 
- in order fot observer_view and pointer_view to update itself dynamically, the page need to auto refresh every second. 
It may cause some inconvenience  and i will try to fix it later


## Use
The program can be directly view by activating a local XAMPP and dragging this file folder to the htdocs folder in XAMPP. 
Pointer_view.php, observer_view.php and moderator_view.php is the three page one need to run the experiment 
and note that the experiment will start only if the start button on the moderator_view is pressed. 
After that the pointer view and observer view can be proceed by press “enter”. 
if you have trouble previewing them let me know and I can deploy them on my private server so you can access. 
