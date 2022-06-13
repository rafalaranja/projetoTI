import sys
import time

import requests ## biblioteca para os pedidos

import winsound

def play_sound(x):
    winsound.PlaySound(x, winsound.SND_ALIAS | winsound.SND_NODEFAULT | winsound.SND_ASYNC)
    
try :

    print( "Prima CTRL+C para terminar")

    

    while True: # ciclo para o programa executar sem parar…

        cont=0

        print("*** LER Estado do som no servidor ***")

        r=requests.get('http://127.0.0.1/Projeto_TI/api/api.php?nome=som&ficheiro=valor')  

        if r.status_code==200:

            
            print(r.text)
            if int(r.text) == 1:
                play_sound("FUNDO.wav")
                while int(r.text)==1 and cont<111 :
                    r=requests.get('http://127.0.0.1/Projeto_TI/api/api.php?nome=som&ficheiro=valor')
                    if int(r.text) == 1:
                        cont=cont+1
                        print(cont)
                        time.sleep(1)
            if int(r.text) == 0:
                play_sound(None)
                

        else:
            print("O pedido HTTP não foi bem sucedido")

        #time.sleep(2.5)    


except KeyboardInterrupt: # caso haja interrupção de teclado CTRL+C

    print( "Programa terminado pelo utilizador")

except : # caso haja um erro qualquer

    print( "Ocorreu um erro:", sys.exc_info() )

finally : # executa sempre, independentemente se ocorreu exception

    print( "Fim do programa") 