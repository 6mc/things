FBZip.exe -p -E hacking-terminal.zip ./yorone
cd yorone
ren css hac
ren js  ha

REM  

@echo off
    setlocal enableextensions disabledelayedexpansion

    for %%a in ("text1.txt") do > "%%~dpna_copy%%~xa" (
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

    echo "my line" > newFile.txt      rem appending css files to beginning of the html files
type myOriginalFile.txt >> newFile.txt
type newFile.txt > myOriginalFile.txt

echo "src-index.js" >> index.html
REM for %%I in (.) do set CurrDirName=%%~nxI
REM echo %CurrDirName%
REM set /p temp="Hit enter to continue"

