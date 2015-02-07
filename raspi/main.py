import InputParser
import db

dbase = DB()
dbase.connect()
bindings = dbase.getBindings()
dbase.close()

instring = input()



parser = InputParser(instring, bindings)
print parser.getValue()
