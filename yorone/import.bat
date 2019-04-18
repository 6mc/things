@echo off
set filename=%1
set ilk=%filename:~0,5%
echo %ilk%  

FBZip.exe -p -E %filename% ./%ilk%


    setlocal enableextensions disabledelayedexpansion

    for %%a in ("index.html") do > "%%~dpna_copy%%~xa" (
        set "line="
        for /f "skip=1 tokens=* delims=0123456789" %%a in ('
            findstr /n /r "^" "%%a"
        ') do (
            if defined line (
                setlocal enabledelayedexpansion
                echo(!line:~1!
                endlocal
            )
            set "line=%%a"
        )
    )

    del index.html
    ren index_copy.html index.html

    echo "<link rel='stylesheet' href='%ilk%/css/style.css'>" > newFile.txt    
      rem appending css files to beginning of the html files
type index.html >> newFile.txt
type newFile.txt > index.html

    echo "<html>" > newFile.txt      
    rem appending <html> files to beginning of the html files
type index.html >> newFile.txt
type newFile.txt > index.html

echo "<script src='%ilk%/js/index.js'></script>" >> index.html 
rem appending js files to end of file


echo "</html>" >> index.html
 rem appending /</html> to end of file


REM for %%I in (.) do set CurrDirName=%%~nxI
REM echo %CurrDirName%
REM set /p temp="Hit enter to continue"

