import sys
import time
import requests 
import winsound

def play_sound(x):
    winsound.PlaySound(x, winsound.SND_ALIAS | winsound.SND_NODEFAULT | winsound.SND_ASYNC)
    
try :

    print( "Prima CTRL+C para terminar")
    
    while True: # ciclo para o programa executar sem parar…

        segundos=0 #Variavel que indica a duração da Música

        print("*** LER Estado do som no servidor ***")

        r=requests.get('http://localhost/TI/ProjetoTI_Fase2/api/api.php?nome=musica&ficheiro=valor')  

        if r.status_code==200:

            
            print(r.text)
            if int(r.text) == 1:
                play_sound("A_Portuguesa.wav")

                #Enquanto o valor do GET estiver a 1 e a variavel segundos for menor que 290
                while int(r.text)==1 and segundos<290 :    
                    #Faz pedido de GET para saber se o utilizador que parar a música
                    r=requests.get('http://localhost/TI/ProjetoTI_Fase2/api/api.php?nome=musica&ficheiro=valor')
                    if int(r.text) == 1:
                        segundos=segundos+1
                        print(segundos)
                        time.sleep(1) #Espera 1 segundo
            if int(r.text) == 0:
                play_sound(None) #Se o valor do GET estiver a 0 para a música
                

        else:
            print("O pedido HTTP não foi bem sucedido")



except KeyboardInterrupt: # caso haja interrupção de teclado CTRL+C

    print( "Programa terminado pelo utilizador")

except : # caso haja um erro qualquer

    print( "Ocorreu um erro:", sys.exc_info() )

finally : # executa sempre, independentemente se ocorreu exception

    print( "Fim do programa") 