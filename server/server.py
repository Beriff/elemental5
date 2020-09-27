from http.server import BaseHTTPRequestHandler, HTTPServer
import urllib.parse as parse
import json

with open('elements.json') as f:
    data = json.load(f)

elements = data
fields = None


class Processor(BaseHTTPRequestHandler):
    def do_GET(self):
        self.send_response(200)
        self.send_header('content-type','text/html')
        self.end_headers()


        self.wfile.write(str(elements).encode())

    def do_POST(self):
        global elements

        content_length = int(self.headers['Content-Length'])
        post_data = self.rfile.read(content_length)
        elements = str(post_data).replace('b', '').replace("'", '')

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
