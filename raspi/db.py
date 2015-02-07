import MySQLdb
import commands
class DB:

    def piId(self):
        return 1

    def __init__(self):
        self.serverIp = "192.168.5.122"
        self.serverUser = "root"
        self.serverPW = ""
        self.serverDb = "fridge"

    def connect(self):
        try:
            self.dbConn = MySQLdb.connect(self.serverIp, self.serverUser, self.serverPW, self.serverDb)
            
        except:
            print "Mysql connection failed"
            raise

    def close(self):
        self.dbConn.close()

    def uploadIp(self):       
        myIp = commands.getoutput("hostname -I")
        sql = "UPDATE `fridge`.`devices` SET `ip` = '%s' WHERE `devices`.`pID` = %d" % (myIp, self.piId())
        self.executeQuery(sql)
        
    def executeQuery(self, sql):
        cursor = self.dbConn.cursor()
        try:
           # Execute the SQL command
           cursor.execute(sql)
           # Commit your changes in the database
           self.dbConn.commit()
           data = cursor.fetchall()
           return data
        except:
           # Rollback in case there is any error
           self.dbConn.rollback()
           raise
    
    def addToList(self,itemId):
        piId = self.piId()
        sql = "INSERT INTO `fridge`.`lists`(pID, itemID) VALUES (%d, %d)" % (piId, itemId)

        data = self.executeQuery(sql)

                
    def getVersion(self):
        # prepare a cursor object using cursor() method
        cursor = self.dbConn.cursor()
        # execute SQL query using execute() method.
        cursor.execute("SELECT VERSION()")
        # Fetch a single row using fetchone() method.
        data = cursor.fetchone()
        print "Database version : %s " % data
    
    def checkPresence(self, itemId):
        piId = self.piId()
        sql = "SELECT * FROM `fridge`.`lists` WHERE pID = '%d' AND itemID = '%d'" % (piId, itemId)
        data = self.executeQuery(sql)
        if len(data) == 0:
            return False
        return True
    
    def getNames(self):
        sql = """ SELECT `fridge`.`mappings`.`itemID`, `fridge`.`items`.`itemName` 
        FROM `fridge`.`mappings` INNER JOIN `fridge`.`items` ON
        `fridge`.`mappings`.`itemID` = `fridge`.`items`.`itemID` 
        WHERE `fridge`.`mappings`.`pID` = '%d'""" % self.piId()
        data = self.executeQuery(sql)
        result = {}
        for row in data:
            result[row[0]] = row[1]
        return result

    def getBindings(self):
        piId = self.piId()
        sql = "SELECT * FROM `fridge`.`mappings` WHERE pID = '%d'" % piId
        data = self.executeQuery(sql)
        result = {}
        for row in data:
            result[row[1]] = row[2]
        return result
        
        
if __name__ == "__main__":
    db = DB()
    db.connect()
    db.getNames()
    db.close()

            
        
