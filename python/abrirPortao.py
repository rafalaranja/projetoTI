import requests
import sys
import datetime



def send_to_api(dados):

    #Caminho para a api.php
    r = requests.post('http://localhost/TI/ProjetoTI_Fase2/API/api.php', dados)

    resposta = r.status_code

    if(resposta == 200):
        print("Operaçao realizada com sucesso")
    
    else:
        print("Operação realizada sem sucesso")



print("\t\tMENU\nSelecione a opção que desejar\nPara fechar o portão clique 0\nPara abrir o portão clique 1\n")

try:

    while True:
        opc = input("Digite a opcao ")
        opc = int(opc)
        horas = datetime.datetime.now()
        print (opc)
        #Se o utilizador do script clicar no 1, coloca o valor portão a 1 na API, se clicar no 0 coloca o valor do portão a 0 na API
        if (opc == 1):
                dados = {'nome': 'portoes' , 'valor': 1 , 'hora':  horas.strftime("%Y/%m/%d %H:%M:%S")}
                send_to_api(dados)
        elif (opc == 0):
                dados = {'nome': 'portoes' , 'valor': 0 , 'hora':  horas.strftime("%Y/%m/%d %H:%M:%S")}
                send_to_api(dados)
           
        else:
            print("O VALOR INSERIDO NAO E PERMITIDO")



finally:
    print("ERRO")

