
class InputParser:

    def __init__(self, input, dictValues):
        self.input = ord(input)
        self.dictValues = dictValues

    def getValue(self):
        
        return self.dictValues[self.input]
