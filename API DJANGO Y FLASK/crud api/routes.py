from flask import render_template, request, redirect, url_for, jsonify
import requests

API_URL = 'http://127.0.0.1:8000/api/clientes/'

def index():
    response = requests.get(API_URL)
    clientes = response.json() if response.status_code == 200 else []
    return render_template('index.html', clientes=clientes)

def create():
    if request.method == 'POST':
        nuevo_cliente = {
            'nombre': request.form['nombre'],
            'dni': request.form['dni'],
            'telefono': request.form['telefono']
        }
        requests.post(API_URL, json=nuevo_cliente)
        return redirect(url_for('index'))
    return render_template('create.html')

def update(id):
    if request.method == 'POST':
        cliente_actualizado = {
            'nombre': request.form['nombre'],
            'dni': request.form['dni'],
            'telefono': request.form['telefono']
        }
        requests.put(f'{API_URL}{id}/', json=cliente_actualizado)
        return redirect(url_for('index'))
    response = requests.get(f'{API_URL}{id}/')
    cliente = response.json() if response.status_code == 200 else None
    return render_template('update.html', cliente=cliente)

def delete(id):
    requests.delete(f'{API_URL}{id}/')
    return redirect(url_for('index'))
