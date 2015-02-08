import inParser
import db
import curses
import getch
import os
import subprocess
import pygame

dbase = db.DB()
dbase.connect()
bindings = dbase.getBindings()
names = dbase.getNames()
dbase.close()

songsOld = ["http://192.168.5.122/fridge/webapp/song.mp3"]
songs = ["song.mp3"]

def killPlayer():
    pygame.mixer.music.stop();

def playSound(url):
    #subprocess.call(["mpg123", url])
    pygame.mixer.music.load(url)
    pygame.mixer.music.play(0)

while 1:
    char = getch.getch()
    print("char is " + char)
    
    if(char == '+'):
        songs.append(songs[0])
        playSound(songs[0])
        songs.pop(0)

    if(char == '-'):
        killPlayer()
    
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
        print "Press correct button you shithead"
