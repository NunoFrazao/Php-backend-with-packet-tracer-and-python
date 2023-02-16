from time import strftime, gmtime
from msvcrt import kbhit, getch
import msvcrt
import time
import requests
import sys


def send_to_api(array):

    # Request post
    post = requests.post('http://127.0.0.1/projeto/sensores/api.php', data = array)

    if post.status_code == 200:
        print("OK: POST realizado com sucesso -", post.status_code)
    else:
        print("ERRO: Não foi possível realizar o pedido -", post.status_code)


try:
    # Print do menu de como usar
    print("\n=== Como usar ===\n\n[0] Fecha a janela\n[1] Abre a janela\n[CTRL+C] Terminar\n\n")

    while True: # ciclo para o programa executar sem parar
        
        # Guarda a tecla que é clicada
        if msvcrt.kbhit():

            tecla = msvcrt.getch()
            
            # Se a tecla que foi clicada foi 0
            if tecla == b'0':
                array = {'microcontrolador': 'atuador',  'nome': 'janela', 'estado': tecla}
                # Manda o array para a função send_to_api
                send_to_api(array)
                print("\nJanela fechada")

            # Se a tecla que foi clicada foi 1
            elif tecla == b'1':
                array = {'microcontrolador': 'atuador',  'nome': 'janela', 'estado': tecla}
                # Manda o array para a função send_to_api
                send_to_api(array)
                print("\nJanela aberta")
            else:
                # Tecla inválida
                print("\n=== Opção inválida ===\n")

                time.sleep(2)

except KeyboardInterrupt:  # caso haja interrupção de teclado CTRL+C
    print("Programa terminado pelo utilizador")
except:  # caso haja um erro qualquer
    print("Ocorreu um erro:", sys.exc_info())
finally:  # executa sempre, independentemente se ocorreu exception
    print("Fim do programa")
