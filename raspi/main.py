import inParser
import db
import curses
import getch
import os
import subprocess
dbase = db.DB()
dbase.connect()
bindings = dbase.getBindings()
names = dbase.getNames()
dbase.close()


while 1:
    char = getch.getch()
    try:
        parser = inParser.InputParser(char, bindings)
        itemId = parser.getValue()
        
        dbase = db.DB()
        dbase.connect()
        
        if not dbase.checkPresence(itemId): 
            dbase.addToList(itemId)
            name = names[itemId]
            text = "%s added to the list." % name
        else:
            text = "item is already in the list"
        dbase.close()       
        subprocess.call('echo '+text+'|festival --tts', shell=True)
    except:
        print "Press correct buttonn you shithead"   


