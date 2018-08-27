cls
@ECHO OFF
title Folder Locker
if EXIST "Control Panel.{21EC2020-3AEA-1069-A2DD-08002B30309D}" goto UNLOCK
if NOT EXIST Locker goto MDLOCKER
:CONFIRM
echo CONFIRM(Y/N)
set/p "cho=>"
if %cho%==Y goto LOCK
if %cho%==y goto LOCK
if %cho%==n goto END
if %cho%==N goto END
echo Invalid choice.
goto CONFIRM
:LOCK
ren Locker "Control Panel.{21EC2020-3AEA-1069-A2DD-08002B30309D}"
attrib "Control Panel.{21EC2020-3AEA-1069-A2DD-08002B30309D}"  +h +s
echo Folder locked
pause
goto End
:UNLOCK
echo Enter
set/p "password=>"
if NOT %password%==%pass% goto FAIL
attrib -h -s "Control Panel.{21EC2020-3AEA-1069-A2DD-08002B30309D}"
ren "Control Panel.{21EC2020-3AEA-1069-A2DD-08002B30309D}" Locker
echo Done
goto End
:FAIL
echo Invalid password
goto end
:MDLOCKER
md Locker
echo Set Password
echo Locker created successfully
goto CREATEPASSWORD
:CREATEPASSWORD
set/p "pass=>"
echo Password set
goto End
:End