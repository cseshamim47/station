#include <windows.h>
#include <gl//gl.h>
#include <GL//glu.h>
#include <GL//glut.h>

void setup()
{

    glClearColor(0.0f, 0.0f, 0.0f, 0.0f); /// backgrounding
}

void display()
{
    glClear(GL_COLOR_BUFFER_BIT);
    glColor3f(0.0f,0.0f,0.0f); /// coloring rect
    glRectf(-0.75f, 0.75f, 0.75f, -0.75f); /// draw rect
    glFlush();
    glutSwapBuffers();
}

int main(int argc, char *argv[]) //
{
    glutInit(&argc, argv);
    glutInitDisplayMode(GLUT_RGB | GLUT_SINGLE);
    glutInitWindowSize(400,400); /// horizontal, vertical
    glutInitWindowPosition(200, 100); /// horizontal, vertical
    glutCreateWindow("Hello World"); /// title of the window
    glutDisplayFunc(display);
    glutMainLoop();
    return 0;
}
