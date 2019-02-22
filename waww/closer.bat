:loop
nircmd.exe mutesysvolume 1
echo ilk metin
TIMEOUT /T 1
echo ikinci metin
taskkill /F /IM chrome.exe /T > nul
goto loop