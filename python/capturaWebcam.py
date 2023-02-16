from importlib.resources import path
import cv2 as cv
import sys
import requests
import time
from face_detection import crop_faces
import dlib
import face_recognition
from msvcrt import kbhit, getch
import os

try:
    while True: # ciclo para o programa executar sem parar
        # Request GET
        r = requests.get('http://127.0.0.1/projeto/sensores/api.php?nome=motion&microcontrolador=sensor')

        # Split dos valores do array
        array_temp = (r.text).split()

        # Buscar o valor da posição 3
        valor_motion = int(array_temp[2])

        if r.status_code == 200:
            # Se o valor for 1, ou seja, detetou movimento
            if(valor_motion == 1):
                
                print("\n\n=== NOVA CAPTURA DE IMAGEM ===\n")
                print("\nPrima CTRL+C na linha de comando para terminar o programa")

                # Chama a funcão crop faces
                img = crop_faces()

                cv.imshow('Imagem', img)
                cv.waitKey(1000)
                cv.imwrite('faces.png', img)
                cv.destroyAllWindows()

                # Imagem já guardada para ser usada como comparação
                imagem_conhecida = face_recognition.load_image_file("face.jpg")
                imagem_conhecida = cv.cvtColor(imagem_conhecida, cv.COLOR_BGR2RGB)
                local_imagem_conhecida = face_recognition.face_locations(imagem_conhecida)[0]
                encode_imagem_conhecida = face_recognition.face_encodings(imagem_conhecida)[0]
                retangulo = cv.rectangle(imagem_conhecida, (local_imagem_conhecida[3], local_imagem_conhecida[0]), (local_imagem_conhecida[1], local_imagem_conhecida[2]), (255, 0, 0), 2)

                # Imagem tirada no momento para ser comparada com a de cima
                imagem_camera = face_recognition.load_image_file("faces.png")
                imagem_camera = cv.cvtColor(imagem_camera, cv.COLOR_BGR2RGB)
                local_imagem_camera = face_recognition.face_locations(imagem_camera)[0]
                encode_imagem_camera = face_recognition.face_encodings(imagem_camera)[0]
                retangulo2 = cv.rectangle(imagem_camera, (local_imagem_conhecida[3], local_imagem_conhecida[0]), (local_imagem_camera[1], local_imagem_camera[2]), (255, 0, 0), 2)

                # Compara ambas as imagens
                compara_imagens = face_recognition.compare_faces([encode_imagem_conhecida], encode_imagem_camera)
                distancia_imagens = face_recognition.face_distance([encode_imagem_conhecida], encode_imagem_camera)

                # Limpa o terminal
                os.system('CLS')

                # Se a comparação tiver sucesso dá print da mensagem
                if (compara_imagens[0] == True):
                    print("As duas imagens são iguais")
            
        else:
            print("O pedido HTTP nao foi bem recebido")

        cv.waitKey(0)
        cv.destroyAllWindows()
        time.sleep(5)

except KeyboardInterrupt:   # CTRL+C para terminar
    print("Programa terminado pelo utilizador")
except:
    print("Ocorreu um erro: ", sys.exc_info())
finally:
    print("Fim do programa")
