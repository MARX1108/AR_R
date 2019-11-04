# AR_R

## 2019.11.4 Updated

1. Updated the first three seconds countdown to be finish in 3 seconds(0.6s delay + 0.8s*3 countdown). Remove the countdown animation (from 3 to 2 to 1) due to content refreshing conflict.
2. Fix the view that says "5 seconds countdown"
3. Get rid of # in front of all numbers in Observer View
4. change the radio buttons from square to round
5. place the label so that the corresponding number will be right above the middle of label
6. fix radio selection error. Nothing will be selected at the beginning of the experiment
7. add confirm button disable functionality. If no radio button is selected, confirm button is disabled.
8. Add random number functionailty. When clicking rehearsal, the a set of 20 random number will be generated to be display.

## 2019.11.3 Updated

This is a fully functioning version with database.
The database can be import into Xampp by directly click "import" on the phpmyadmin page

### Known Issues

1. there is 1-2 seconds delay in the beginning countdown of pointer view.
2. Resizing window can cause display issue. 
3. After clicking start, filling out the experiment info and clicking submit, the experiment will start but there will not be a alert like reset button. This is due to the backend setup. To add a alert to the start button require a huge change to the backend so for now I just leave it there. To help alleviate the issue, I add a real time sync of the pointer state and observer state so that moderator view can display the two states. 
   





---------------------------------------------------------
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
