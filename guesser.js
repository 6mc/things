function guessNationality(name) {
    var names = name.split(" ");
    
     if(names[1].slice(-3) == "van")
    {
        console.log("Dutch")
    }
    else if(names[1].includes("oğlu") ||names[0].slice(-1) == "n" || names[1].slice(-2) == "an" || name.includes("ı") || name.includes("ç") || name.includes("ğ") || name.includes("ü") || name.includes("ş"))
    {
        console.log("Turkish")
    }

    else if(names[1].includes("cc") ||names[1].includes("ss") || names[1].includes("tt") || names[1].includes("ll") || names[1].slice(-2) == "ni" )
    {
        console.log("Italian")
    }
    
    else if(names[1].toLowerCase().includes("mc") || names[1].includes("'"))
    {
        console.log("Scotch")
    }

    else if(names[1].slice(-2) == "ic" || names[1].slice(-2) == "ić" )
    {
        console.log("balkan")
    }
    else if(names[1].slice(-3) == "son")
    {
        console.log("icelandic or Swedish")
        console.log("American")
    }
    else if(names[1].slice(-4) == "berg")
    {
        console.log("Swedish")
    }
    else if(names[1].slice(-3) == "sen")
    {
        console.log("Denmark:D")
    }
    else if(names[1].slice(-5) == "gaard")
    {
        console.log("nordic")
    }
    else if(names[1].slice(-2) == "nd")
    {
        console.log("french")
    }

    else if(names[1].slice(-2) == "rd")
    {
        console.log("french")
    }
    else if(names[1].slice(-2) == "er" || names[1].slice(-4) == "mann" || names[1].slice(-2) == "ch" || names[1].toLowerCase().includes("sch") )
    {
        console.log("German")
    }
    else if(names[1].slice(-2) == "ez")
    {
        console.log("Hispanic")
    }

    else if(names[1].slice(-2) == "es" ||names[1].slice(-2) == "do" )
    {
        console.log("Porteguese")
    }
    else if(names[1].slice(-1) == "a")
    {
        console.log("Latin")
    }

    else if(name.includes("sz") || names[1].slice(-3) == "ski")
    {
        console.log("Polish")
    }

    else if(names[1].slice(-3) == "eva" ||names[1].slice(-2) == "ev" || names[1].slice(-2) == "ov" || names[1].slice(-3) == "ova")
    {
        console.log("Slavic")
    }


    else if(names[1].slice(-2) == "ng")
    {
        console.log("Chinese")
    }

    else if(names[1].toLowerCase().slice(-2) == "el" || names[1].toLowerCase().slice(-2) == "al")
    {
        console.log("Arabic")
    }
    else if(names[1].slice(-2) == "ek")
    {
        console.log("Polish")
    }
    else if(names[1].includes("ogl") ||names[1].slice(-2) == "as" || names[1].slice(-2) == "is")
    {
        console.log("Greek")
    }
    else if( names[1].slice(-1) == "s")
    {
        console.log("USA")
    }

    else if( names[1].slice(-2) == "en")
    {
        console.log("Finnish")
    }

    else if( names[0].slice(-1) == "y")
    {
        console.log("British")
    }

    else if( names[0].length == 2 || names[1].length == 2)
    {
        console.log("chinese")
    }

    else 
        console.log("african")

}