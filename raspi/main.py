import inParser
import db
import curses
import getch
import os
import subprocess
import pyaudio
import wave
import sys

CHUNK = 1024




dbase = db.DB()
dbase.connect()
bindings = dbase.getBindings()
names = dbase.getNames()
dbase.close()

songs = ["http://192.168.5.122/fridge/webapp/song.mp3"]


def killPlayer():
    aubprocess.call(["pkill",  "mpg123"])

def playSound(url):
    #subprocess.call(["mpg123", url])
    

    wf = wave.open(url, 'rb')

    p = pyaudio.PyAudio()

    stream = p.open(format=p.get_format_from_width(wf.getsampwidth()),
                channels=wf.getnchannels(),
                rate=wf.getframerate(),
                output=True)

    data = wf.readframes(CHUNK)

    while data != '':
        stream.write(data)
        data = wf.readframes(CHUNK)

    stream.stop_stream()
    stream.close()

    p.terminate()

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
