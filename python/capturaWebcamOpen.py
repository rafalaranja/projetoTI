import cv2 as cv
import sys


try:
    while (KeyboardInterrupt != 0):
        camera = cv.VideoCapture(0, cv.CAP_DSHOW)
        ret, image = camera.read()
        if (ret == 1):
          print ("Resultado da Camera=" + str(ret))
          cv.imwrite('webcam.jpg', image)
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

finally : # executa sempre, independentemente se ocorreu exception

    print( "Fim do programa")