import inParser
import db
import curses
import getch
import os
import subprocess
import pygame
import thread


dbase = db.DB()
dbase.connect()
bindings = dbase.getBindings()
names = dbase.getNames()
dbase.close()

songsOld = ["http://192.168.5.122/fridge/webapp/song.mp3"]
songs = ["song.mp3"]

global player

print("Running...")

def stopCommand():
    global player
    #pygame.mixer.music.stop();
    print("stop attempted...")
    player.stdin.write("q")

def playSound(url):
    global player
    #subprocess.call(["mpg123", url])
    player = subprocess.Popen(["omxplayer","song.mp3"], stdin = subprocess.PIPE, stdout = subprocess.PIPE,stderr = subprocess.PIPE)
    print("Playing sound..." + url)
    #pygame.mixer.music.load(url)
    #pygame.mixer.music.play(0)

def playCommand():
    
    songs.append(songs[0])
    playSound(songs[0])
    songs.pop(0)

while 1:
    char = getch.getch()
    print("char is " + char)
    
    if(char == '+'):
         playCommand()
        
    elif(char == 'r'):
        stopCommand()
    else:
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
            raise
            print "Press correct button you shithead"
