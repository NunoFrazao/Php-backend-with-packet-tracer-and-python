import time
import sys
import requests
import winsound 

# Function play sound
def play_sound():
    winsound.PlaySound("Alarm.wav", winsound.SND_ALIAS)
    #play_obj = wave_obj.play() # tocar o audio
    #play_obj.wait_done() # espera ate o audio terminar
    
    
try :
    # Ctrl + C para terminar o programa
    print("Prima CTRL+C para terminar")
    while True: # ciclo para o programa executar sem parar

        # Request GET
        r = requests.get('http://127.0.0.1/projeto/sensores/api.php?nome=buzina&microcontrolador=atuador')

        # Split dos valores do array
        array_temp = (r.text).split()

        # Buscar o valor da posição 3
        valor = int(array_temp[2])

        if r.status_code == 200:
            # Se o valor for 1 então fica ligado
            if valor == 1:
                print("Buzzer ligado: ", valor)
                # Reproduz o som
                play_sound() # chamar a função criada
            else:
                print("Buzzer desligado:", valor)
        else:
            print( "O pedido HTTP não foi bem sucedido")

        time.sleep (2)
except KeyboardInterrupt: # caso haja interrupção de teclado CTRL+C
    print("Programa terminado pelo utilizador")
except : # caso haja um erro qualquer
    print("Ocorreu um erro:", sys.exc_info() )
finally : # executa sempre, independentemente se ocorreu exception
    print("Fim do programa") 