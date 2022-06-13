import sys
import time
from time import sleep
import requests
import winsound

def play_sound(file):
    winsound.PlaySound(file, winsound.SND_FILENAME)

try :

    print( "Prima CTRL+C para terminar")
    

    while True: # ciclo para o programa executar sem parar…

        r=requests.get("http://localhost/TI/ProjetoTI_Fase2/api/api.php?nome=musica")
        print(r.text)
        if(r.text=='1'):
            while(KeyboardInterrupt != 0):
                play_sound('A_Portuguesa.wav')
        elif(r.text=='0'):
            play_sound(None)
        else:
            print("O pedido HTTP não foi bem sucedido")
        
        time.sleep (2)

except KeyboardInterrupt: # caso haja interrupção de teclado CTRL+C

    print( "Programa terminado pelo utilizador")

except : # caso haja um erro qualquer

    print( "Ocorreu um erro:", sys.exc_info() )

finally : # executa sempre, independentemente se ocorreu exception

    print( "Fim do programa") 