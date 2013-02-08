My Personal Website:
====================

Hosted at [www.tomzaki.com](http://www.tomzaki.com)

About
-----

 - Right now there's just some links to my online presence

 - CSS only supports chrome and webkit browsers, definitely
   need to either change the layout or find some hacks
   for Firefox, Safari, and IE.
 
 - In the future there are plans for server file access
   i.e. serving up content for downloading and streaming.
   In addition there are plans to develop some simple 
   web-based electronics design utilities and host them
   as well. 
 
 - Before any of the file sharing stuff is added, I need 
   to develop a secure php login script (possibly tapping
   into a MySQL database of usernames+passwords). 

 - The login script is still very much a work in progress.
   Look for updates in my test-code-website repo.
   
TODO:
-----

 - Fix bug that causes "bad login cookie" for returning users.
   This bug is likely due to the recently changed checklogin.php
   code which now allows for returning users to automatically be
   logged in from any members-restricted page.

 - Add login page from test code once it's complete to
   avoid having to use http basic auth
