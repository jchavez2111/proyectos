from flask import Flask
from routes import index, create, update, delete

app = Flask(__name__)

# Register the routes directly
app.add_url_rule('/', 'index', index)
app.add_url_rule('/create', 'create', create, methods=['GET', 'POST'])
app.add_url_rule('/update/<int:id>', 'update', update, methods=['GET', 'POST'])
app.add_url_rule('/delete/<int:id>', 'delete', delete, methods=['POST'])

if __name__ == '__main__':
    app.run(port=5000, debug=True)
