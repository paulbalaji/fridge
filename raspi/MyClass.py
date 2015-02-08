import threading
import subprocess

class MyClass(threading.Thread):
    def __init__(self, urlPrime):
        self.url = urlPrime
        self.stdout = None
        self.stderr = None
        threading.Thread.__init__(self)

    def run(self):
        p = subprocess.Popen('omxplayer' + url.split(),
                             shell=False,
                             stdout=subprocess.PIPE,
                             stderr=subprocess.PIPE)

        self.stdout, self.stderr = p.communicate()
