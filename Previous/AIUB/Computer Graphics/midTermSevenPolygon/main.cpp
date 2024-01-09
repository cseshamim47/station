
#include<windows.h>
#include<GLUT/glut.h>
#else
#include <GL/glut.h>
#endif
#include<math.h>
#include<stdlib.h>

void Draw(){
    glClear(GL_COLOR_BUFFER_BIT);
    glColor3d(255,0,0);
    glBegin(GL_POLYGON);

    glVertex2f(0.0,0.0);
    glVertex2f(5.0,2.0);
    glVertex2f(2.0,-5.0);
    glVertex2f(-0.5,-0.5);
    glVertex2f(-5.0,-2.0);
    glVertex2f(-3.0,6.0);

    glEnd();
    glFlush();
}

void Initialize()
{
    glClearColor(2,100,0,1.0);
    glMatrixMode(GL_PEOJECTION);
    glLoadIdentity();
    glOrtho(-10.0,10.0,-10.0,10.0,-10.0,10.0);
}
int main(int iArgc, char** cppArgv)
{
    glutInit(&iArgc, cppArgv);
    glutInitDisplayMode(GLUT_SINGLE | GLUT_RGB);
    glutInitWindowSize(476,477);
    glutInitWindowPosition(250,250);
    glutCreateWindow("Polygon");
    Initialize();
    glutDisplayFunc(Draw);
    glutMainLoop();
    return EXIT_SUCCESS;
}

