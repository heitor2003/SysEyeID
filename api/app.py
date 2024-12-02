import numpy as np
from flask import Flask, request, jsonify
import pickle
import os
from PIL import Image  # Para processar a imagem
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

# Carregando o modelo previamente treinado
modelo = pickle.load(open('modelo_ia.pkl', 'rb'))

@app.route("/")
def verifica_api_online():
    return "API ONLINE v1.0", 200

@app.route('/predict', methods=['POST'])
def predict():
    try:
        # Verifica se o arquivo foi enviado
        if 'file' not in request.files:
            return jsonify({"error": "Nenhum arquivo enviado"}), 400

        arquivo = request.files['file']

        # Abre a imagem usando Pillow
        imagem = Image.open(arquivo)

        tamanho_esperado = (224, 224)
        imagem = imagem.resize(tamanho_esperado)

        imagem_array = np.array(imagem) / 255.0
        imagem_array = np.expand_dims(imagem_array, axis=0)

        # Faz a previsão com o modelo
        predicao = modelo.predict(imagem_array)
        resultado = predicao.tolist()

        # Retorna a resposta como JSON
        resposta = {'predicao': resultado}
        return jsonify(resposta)

    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == "__main__":
    port = int(os.environ.get("PORT", 5000))
    app.run(host='0.0.0.0', port=port)
