API for sending values to Artiste's UDP server module for VZX Creative 0.9.4.1 (Release TBA)

This is written in PHP and should be pretty straight forward to understand.

While this is primarily intended as an example, it can also be used as a starting point for your own projects.


1. Download and Install PHP for Windows
Recommended is to have it in C:\php so that C:\php\php.exe is valid.

Note! If you didn't put it in C:\php, edit "php_path.bat" to point it at the installed location.

2. Copy php.ini-development to php.ini
Without a php.ini, php will only use default settings.

3. Edit php.ini and find this section in the file.
Make sure the "sockets" row is uncommented (remove the semicolon)

;extension=soap
extension=sockets
;extension=sodium
;extension=sqlite3
;extension=tidy
;extension=xmlrpc

Enabling this means PHP can now send data packets on the network.


Now you have the basics set up and should be able to run the bat files.
Each bat file has a corresponding script file which does the actual work.

If you don't want the console window to pop up every time a bat file is run, you can create a Windows Shortcut and
then modify the "Run" value to not be "Normal Window" but instead "Minimized" which still opens up a console window,
but it's minimized.

Note that the first time a script is launched, it can be a bit slow. But consecutive runs of the same or other scripts
seems to be fine.