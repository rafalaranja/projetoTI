import cv2 as cv
import sys


try:
    x=0
    while (KeyboardInterrupt != 0):
        if(x != 15):            #LIMITE DE 10 FOTOS (AO FINAL DE GUARDAR 10 FOTOS COMEÇA A GRAVAR POR CIMA DAS EXISTENTES)
            x=x+1
        else:
            x=1
        camera = cv.VideoCapture(0, cv.CAP_DSHOW)
        ret, image = camera.read()
        if (ret == 1):
          resultado = "webcam" + str(x)
          print ("Resultado da Camera=" + str(ret))
          foto = str(resultado) + ".jpg"
          cv.imwrite(foto, image)
          #move_file()
          #cv.imshow('Imagem', image)
          #cv.waitKey(3000)
          camera.release()
          cv.destroyAllWindows()
        else:
            print("Erro")
        cv.waitKey(5000)
except KeyboardInterrupt: # caso haja interrupção de teclado CTRL+C

    print( "Programa terminado pelo utilizador")

except : # caso haja um erro qualquer

    print( "Ocorreu um erro:", sys.exc_info() )
    cv.waitKey(5000)

finally : # executa sempre, independentemente se ocorreu exception

    print( "Fim do programa")