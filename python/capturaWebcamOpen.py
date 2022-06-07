from re import X
import cv2 as cv
import sys


try:
    x=1
    while (KeyboardInterrupt != 0):
        x=x+1
        camera = cv.VideoCapture(0, cv.CAP_DSHOW)
        ret, image = camera.read()
        if (ret == 1):
          resultado = "webcam" + str(x)
          print ("Resultado da Camera=" + str(ret))
          foto = str(resultado) + ".jpg"
          cv.imwrite(foto, image)
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