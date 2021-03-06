from http.server import BaseHTTPRequestHandler, HTTPServer
import urllib.parse as parse
import json

f = open('elements.json', mode='r+')
data = json.load(f)
f.close()

elements = dict(data)
fields = None



class Processor(BaseHTTPRequestHandler):
    def do_GET(self):
        self.send_response(200)
        self.send_header('content-type','text/html')
        self.end_headers()


        self.wfile.write(str(elements).encode())

    def do_POST(self):
        global elements
        f2 = open('elements.json', mode='w+')

        content_length = int(self.headers['Content-Length'])
        post_data = self.rfile.read(content_length)

        print('received data')

        save = eval(str(post_data).replace('b', '').replace("'", ''))

        print(save)

        updatedElements = {**elements, **save}

        print('merged dicts')

        f2.write(json.dumps(updatedElements))

        print('written to file')

        elements = dict(updatedElements)
        f.close()

        print('closed')


        self.send_response(200)
        self.send_header('content-type','text/html')
        self.end_headers()

server = HTTPServer(('localhost', 81), Processor)
server.serve_forever()

if __name__ == '__main__':
    from sys import argv

    if len(argv) == 2:
        run(port=int(argv[1]))
    else:
        run()
