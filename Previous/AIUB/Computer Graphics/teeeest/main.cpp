#include <windows.h>
#include<iostream>
#include<GL/gl.h>
#include<GL/glut.h>
#include<math.h>
#define PI  3.14159265358979323846
using namespace std;

float _move = 0.0f;  //plane
float _move1 = 0.0f; //boat
float _move2 = 0.0f; //bus
float _move3 = 0.0f; //bird
float _move4 = 0.0f; //cloud1
float _move5 = 0.0f; //cloud2
float _move6 = 0.0f; //car

void drawScene()
{
    glClear(GL_COLOR_BUFFER_BIT);
    glClearColor(1.0, 1.0, 1.0, 0.0);
    glLoadIdentity(); //Reset the drawing perspective
    glMatrixMode(GL_MODELVIEW);

    //Sky
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(0.49, 1.0, 1.0);
    glVertex3f(-25, 0.0, 0.0);
    glVertex3f(-25, 11.5, 0.0);
    glVertex3f(25, 11.5, 0.0);
    glVertex3f(25, 0.0, 0.0);
    glEnd();
    glPopMatrix();

    //sun
    glPushMatrix();
    glTranslatef(0.8,0.8,0.0);
    glColor3f(1.0,1.0,0.0);
    glBegin(GL_POLYGON);

    for (int i=0; i< 600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.1;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    //Cloud 1

    glPushMatrix();
    glTranslatef(_move4+0.2, 0.8, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);

    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move4+0.28, 0.8, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move4+0.35, 0.8, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move4+0.2, 0.75, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move4+0.28, 0.75, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move4+0.35, 0.75, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move4+0.15, 0.77, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move4+0.39, 0.77, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    //Cloud 2

    glPushMatrix();
    glTranslatef(_move5+0.6, 0.6, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move5+0.68, 0.6, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move5+0.75, 0.6, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move5+0.6, 0.65, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move5+0.68, 0.65, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move5+0.75, 0.65, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move5+0.55, 0.62, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move5+0.79, 0.62, 0.0);
    glColor3f(1.0, 1.0, 1.0);
    glBegin(GL_POLYGON);
    for(int i=0; i<600; i++)
    {
        float pi = 3.1416;
        float A = (i*2*pi)/100;
        float r = 0.05;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();

    //Bird

    glPushMatrix();
    glTranslatef(_move3, 0.0, 0.0);

    //Tail
    glBegin(GL_POLYGON);
    glColor3f(0.0, 0.0, 0.0);
    glVertex3f(0.933f, 0.4f, 0.0f);
    glVertex3f(1.0f, 0.466f, 0.0f);
    glVertex3f(0.966f, 0.45f, 0.0f);
    glEnd();

    //Body
    glBegin(GL_POLYGON);
    glColor3f(1.0, 0.0, 0.0);
    glVertex3f(0.933f, 0.4f, 0.0f);
    glVertex3f(0.966f, 0.45f, 0.0f);
    glVertex3f(0.933f, 0.466f, 0.0f);
    glVertex3f(0.85f, 0.466f, 0.0f);
    glVertex3f(0.883f, 0.466f, 0.0f);
    glEnd();

    //Lips
    glBegin(GL_POLYGON);
    glColor3f(0.37, 0.37, 0.37);
    glVertex3f(0.833f, 0.4f, 0.0f);
    glVertex3f(0.833f, 0.433f, 0.0f);
    glVertex3f(0.85f, 0.466f, 0.0f);
    glEnd();

    //Wings
    glBegin(GL_POLYGON);
    glColor3f(0.0, 0.0, 0.0);
    glVertex3f(0.866f, 0.466f, 0.0f);
    glVertex3f(0.916f, 0.466f, 0.0f);
    glVertex3f(0.883f, 0.533f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0, 0.0, 0.0);
    glVertex3f(0.9f, 0.466f, 0.0f);
    glVertex3f(0.933f, 0.466f, 0.0f);
    glVertex3f(0.925f, 0.512f, 0.0f);
    glEnd();
    glPopMatrix();

    //Road
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(0.698, 0.745, 0.7098);
    glVertex3f(-1.0f, -0.33f, 0.0f);
    glVertex3f(1.0f, -0.33f, 0.0f);
    glVertex3f(1.0f, 0.0f, 0.0f);
    glVertex3f(-1.0f, 0.0f, 0.0f);
    glEnd();
    glPopMatrix();

    //RoadLines
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(1.0, 1.0, 1.0);
    glVertex3f(-1.0f, -0.166f, 0.0f);
    glVertex3f(-0.5f, -0.166f, 0.0f);
    glVertex3f(-0.5f, -0.13f, 0.0f);
    glVertex3f(-1.0f, -0.13f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0, 1.0, 1.0);
    glVertex3f(-0.33f, -0.166f, 0.0f);
    glVertex3f(-0.166f, -0.166f, 0.0f);
    glVertex3f(-0.166f, -0.13f, 0.0f);
    glVertex3f(-0.33f, -0.13f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0, 1.0, 1.0);
    glVertex3f(0.33f, -0.166f, 0.0f);
    glVertex3f(0.833f, -0.166f, 0.0f);
    glVertex3f(0.833f, -0.13f, 0.0f);
    glVertex3f(0.33f, -0.13f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0, 1.0, 1.0);
    glVertex3f(0.833f, -0.166f, 0.0f);
    glVertex3f(1.0f, -0.166f, 0.0f);
    glVertex3f(1.0f, -0.13f, 0.0f);
    glVertex3f(0.833f, -0.13f, 0.0f);
    glEnd();
    glPopMatrix();

    //Lake
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(0.23, 0.70, 0.81);
    glVertex3f(-1.0f, -1.0f, 0.0f);
    glVertex3f(1.0f, -1.0f, 0.0f);
    glVertex3f(1.0f, -0.33f, 0.0f);
    glVertex3f(-1.0f, -0.33f, 0.0f);
    glEnd();
    glPopMatrix();

    //Border
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(0.2, 0.098, 0.0);
    glVertex3f(-1.0f, -0.33f, 0.0f);
    glVertex3f(1.0f, -0.33f, 0.0f);
    glVertex3f(1.0f, -0.416f, 0.0f);
    glVertex3f(-1.0f, -0.416f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0, 0.0, 0.0);
    glVertex3f(-1.0f, -0.35f, 0.0f);
    glVertex3f(1.0f, -0.35f, 0.0f);
    glVertex3f(1.0f, -0.33f, 0.0f);
    glVertex3f(-1.0f, -0.33f, 0.0f);
    glEnd();
    glPopMatrix();

////Plane////
    glPushMatrix();
    glTranslatef(_move, 0.0f, 0.0f);

    glBegin(GL_POLYGON);
    glColor3f(1.0,1.0, 1.0);
    glVertex3f(-1.0f, 0.5f, 0.0f);
    glVertex3f(-0.5f, 0.5f, 0.0f);
    glVertex3f(-0.366f, 0.55f, 0.0f);
    glVertex3f(-0.45f, 0.616f, 0.0f);
    glVertex3f(-0.5f, 0.66f, 0.0f);
    glVertex3f(-1.0f, 0.66f, 0.0f);
    glEnd();

    ////Plane Windows///
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0, 0.0);
    glVertex3f(-0.966f, 0.55f, 0.0f);
    glVertex3f(-0.916f, 0.55f, 0.0f);
    glVertex3f(-0.916f, 0.63f, 0.0f);
    glVertex3f(-0.966f, 0.63f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0, 1.0);
    glVertex3f(-0.866f, 0.55f, 0.0f);
    glVertex3f(-0.816f, 0.55f, 0.0f);
    glVertex3f(-0.816f, 0.63f, 0.0f);
    glVertex3f(-0.866f, 0.63f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0, 1.0);
    glVertex3f(-0.766f, 0.55f, 0.0f);
    glVertex3f(-0.716f, 0.55f, 0.0f);
    glVertex3f(-0.716f, 0.63f, 0.0f);
    glVertex3f(-0.766f, 0.63f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0, 1.0);
    glVertex3f(-0.666f, 0.55f, 0.0f);
    glVertex3f(-0.616f, 0.55f, 0.0f);
    glVertex3f(-0.616f, 0.63f, 0.0f);
    glVertex3f(-0.666f, 0.63f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0, 0.0);
    glVertex3f(-0.566f, 0.55f, 0.0f);
    glVertex3f(-0.516f, 0.55f, 0.0f);
    glVertex3f(-0.516f, 0.63f, 0.0f);
    glVertex3f(-0.566f, 0.63f, 0.0f);
    glEnd();

    ////Plane sides////
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0, 0.0);
    glVertex3f(-0.916f, 0.66f, 0.0f);
    glVertex3f(-0.83f, 0.66f, 0.0f);
    glVertex3f(-0.883f, 0.833f, 0.0f);
    glVertex3f(-0.916f, 0.833f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.0, 1.0);
    glVertex3f(-0.66f, 0.66f, 0.0f);
    glVertex3f(-0.583f, 0.66f, 0.0f);
    glVertex3f(-0.633f, 0.833f, 0.0f);
    glVertex3f(-0.7f, 0.833f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.0, 1.0);
    glVertex3f(-0.66f, 0.33f, 0.0f);
    glVertex3f(-0.616f, 0.33f, 0.0f);
    glVertex3f(-0.583f, 0.516f, 0.0f);
    glVertex3f(-0.68f, 0.516f, 0.0f);
    glEnd();
    glPopMatrix();

    ////BuildingsBackRow////

    ////1////
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(0.4,0.2, 0.0);
    glVertex3f(-0.66f, 0.0f, 0.0f);
    glVertex3f(-0.416f, 0.0f, 0.0f);
    glVertex3f(-0.416f, 0.25f, 0.0f);
    glVertex3f(-0.66f, 0.25f, 0.0f);
    glEnd();

    ////2////
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(0.8,1.0, 0.6);
    glVertex3f(-0.25f, 0.0f, 0.0f);
    glVertex3f(0.0f, 0.0f, 0.0f);
    glVertex3f(0.0f, 0.25f, 0.0f);
    glVertex3f(-0.25f, 0.25f, 0.0f);
    glEnd();

    ////3////
    glBegin(GL_POLYGON);
    glColor3f(0.6,0.0, 0.29);
    glVertex3f(0.33f, 0.0f, 0.0f);
    glVertex3f(0.5f, 0.0f, 0.0f);
    glVertex3f(0.5f, 0.25f, 0.0f);
    glVertex3f(0.33f, 0.25f, 0.0f);
    glEnd();

    ////4////
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.5);
    glVertex3f(0.833f, 0.0f, 0.0f);
    glVertex3f(1.0f, 0.0f, 0.0f);
    glVertex3f(1.0f, 0.25f, 0.0f);
    glVertex3f(0.833f, 0.25f, 0.0f);
    glEnd();

    /////BackRowBuildingWindow////

    ////1////
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.65f, 0.166f, 0.0f);
    glVertex3f(-0.566f, 0.166f, 0.0f);
    glVertex3f(-0.566f, 0.216f, 0.0f);
    glVertex3f(-0.65f, 0.216f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.65f, 0.15f, 0.0f);
    glVertex3f(-0.566f, 0.15f, 0.0f);
    glVertex3f(-0.566f, 0.1f, 0.0f);
    glVertex3f(-0.65f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.65f, 0.083f, 0.0f);
    glVertex3f(-0.566f, 0.083f, 0.0f);
    glVertex3f(-0.566f, 0.033f, 0.0f);
    glVertex3f(-0.65f, 0.033f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.55f, 0.166f, 0.0f);
    glVertex3f(-0.5f, 0.166f, 0.0f);
    glVertex3f(-0.5f, 0.216f, 0.0f);
    glVertex3f(-0.55f, 0.216f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.55f, 0.15f, 0.0f);
    glVertex3f(-0.5f, 0.15f, 0.0f);
    glVertex3f(-0.5f, 0.1f, 0.0f);
    glVertex3f(-0.55f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.55f, 0.083f, 0.0f);
    glVertex3f(-0.5f, 0.083f, 0.0f);
    glVertex3f(-0.5f, 0.033f, 0.0f);
    glVertex3f(-0.55f, 0.033f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.483f, 0.166f, 0.0f);
    glVertex3f(-0.433f, 0.166f, 0.0f);
    glVertex3f(-0.433f, 0.216f, 0.0f);
    glVertex3f(-0.483f, 0.216f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.483f, 0.15f, 0.0f);
    glVertex3f(-0.433f, 0.15f, 0.0f);
    glVertex3f(-0.433f, 0.1f, 0.0f);
    glVertex3f(-0.483f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.69, 0.4);
    glVertex3f(-0.483f, 0.083f, 0.0f);
    glVertex3f(-0.433f, 0.083f, 0.0f);
    glVertex3f(-0.433f, 0.033f, 0.0f);
    glVertex3f(-0.483f, 0.033f, 0.0f);
    glEnd();

    ////2////
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.233f, 0.166f, 0.0f);
    glVertex3f(-0.166f, 0.166f, 0.0f);
    glVertex3f(-0.166f, 0.216f, 0.0f);
    glVertex3f(-0.233f, 0.216f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.233f, 0.15f, 0.0f);
    glVertex3f(-0.166f, 0.15f, 0.0f);
    glVertex3f(-0.166f, 0.1f, 0.0f);
    glVertex3f(-0.233f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.233f, 0.083f, 0.0f);
    glVertex3f(-0.166f, 0.083f, 0.0f);
    glVertex3f(-0.166f, 0.033f, 0.0f);
    glVertex3f(-0.233f, 0.033f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.15f, 0.166f, 0.0f);
    glVertex3f(-0.066f, 0.166f, 0.0f);
    glVertex3f(-0.066f, 0.216f, 0.0f);
    glVertex3f(-0.15f, 0.216f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.15f, 0.15f, 0.0f);
    glVertex3f(-0.066f, 0.15f, 0.0f);
    glVertex3f(-0.066f, 0.1f, 0.0f);
    glVertex3f(-0.15f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.15f, 0.083f, 0.0f);
    glVertex3f(-0.066f, 0.083f, 0.0f);
    glVertex3f(-0.066f, 0.033f, 0.0f);
    glVertex3f(-0.15f, 0.033f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.05f, 0.166f, 0.0f);
    glVertex3f(0.0f, 0.166f, 0.0f);
    glVertex3f(0.0f, 0.216f, 0.0f);
    glVertex3f(-0.05f, 0.216f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.05f, 0.15f, 0.0f);
    glVertex3f(0.0f, 0.15f, 0.0f);
    glVertex3f(0.0f, 0.1f, 0.0f);
    glVertex3f(-0.05f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4, 0.4);
    glVertex3f(-0.05f, 0.083f, 0.0f);
    glVertex3f(0.0f, 0.083f, 0.0f);
    glVertex3f(0.0f, 0.033f, 0.0f);
    glVertex3f(-0.05f, 0.033f, 0.0f);
    glEnd();

    ////3////
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.8, 1.0);
    glVertex3f(0.366f, 0.166f, 0.0f);
    glVertex3f(0.466f, 0.166f, 0.0f);
    glVertex3f(0.466f, 0.216f, 0.0f);
    glVertex3f(0.366f, 0.216f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.8, 1.0);
    glVertex3f(0.366f, 0.15f, 0.0f);
    glVertex3f(0.466f, 0.15f, 0.0f);
    glVertex3f(0.466f, 0.1f, 0.0f);
    glVertex3f(0.366f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.8, 1.0);
    glVertex3f(0.366f, 0.083f, 0.0f);
    glVertex3f(0.466f, 0.083f, 0.0f);
    glVertex3f(0.466f, 0.033f, 0.0f);
    glVertex3f(0.366f, 0.033f, 0.0f);
    glEnd();

    ////4////
    glBegin(GL_POLYGON);
    glColor3f(1.0,1.0, 0.4);
    glVertex3f(0.866f, 0.166f, 0.0f);
    glVertex3f(0.966f, 0.166f, 0.0f);
    glVertex3f(0.966f, 0.216f, 0.0f);
    glVertex3f(0.866f, 0.216f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,1.0, 0.4);
    glVertex3f(0.866f, 0.15f, 0.0f);
    glVertex3f(0.966f, 0.15f, 0.0f);
    glVertex3f(0.966f, 0.1f, 0.0f);
    glVertex3f(0.866f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,1.0, 0.4);
    glVertex3f(0.866f, 0.083f, 0.0f);
    glVertex3f(0.966f, 0.083f, 0.0f);
    glVertex3f(0.966f, 0.033f, 0.0f);
    glVertex3f(0.866f, 0.033f, 0.0f);
    glEnd();



    //car

    glPushMatrix();
    glTranslatef(_move6, 0.0f, 0.0f);
    glColor3f(0.0,0.0,1.0);
    glBegin(GL_POLYGON);
    glVertex2f(-0.85, 0.0);
    glVertex2f(-0.55, 0.0);
    glVertex2f(-0.55, 0.07);
    glVertex2f(-0.60, 0.07);
    glVertex2f(-0.65, 0.17);
    glVertex2f(-0.75, 0.17);
    glVertex2f(-0.80, 0.17);
    glVertex2f(-0.85, 0.07);
    glVertex2f(-0.85, 0.0);
    glEnd();
    glPopMatrix();

    glColor3f(0.0, 0.0, 0.0);
    glPushMatrix();
    glTranslatef(_move6, 0.0f, 0.0f);
    glBegin(GL_POLYGON);
    glVertex2f(-0.61, 0.07);
    glVertex2f(-0.66, 0.16);
    glVertex2f(-0.79, 0.16);
    glVertex2f(-0.84, 0.07);
    glEnd();
    glPopMatrix();

    glColor3f(0.000, 0.545, 0.545);
    glPushMatrix();
    glTranslatef(_move6, 0.0f, 0.0f);
    glBegin(GL_POLYGON);
    glVertex2f(-0.73, 0.07);
    glVertex2f(-0.72, 0.07);
    glVertex2f(-0.72, 0.16);
    glVertex2f(-0.73, 0.16);
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move6, 0.0f, 0.0f);
    glTranslatef(-0.80,0.01,0);
    glScalef(0.6,1,1);
    glColor3f(0.000, 0.000, 0.000);
    glBegin(GL_POLYGON);
    for(int i=0; i<200; i++)
    {
        float pi=3.1416;
        float A=(i*2*pi)/200;
        float r=0.04;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y );
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move6, 0.0f, 0.0f);
    glTranslatef(-0.80,0.01,0);
    glScalef(0.6,1,1);
    glColor3f(1.000, 1.000, 1.000);
    glBegin(GL_POLYGON);
    for(int i=0; i<200; i++)
    {
        float pi=3.1416;
        float A=(i*2*pi)/200;
        float r=0.01;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y );
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move6, 0.0f, 0.0f);
    glTranslatef(-0.62,0.01,0);
    glScalef(0.6,1,1);
    glColor3f(0.000, 0.000, 0.000);
    glBegin(GL_POLYGON);
    for(int i=0; i<200; i++)
    {
        float pi=3.1416;
        float A=(i*2*pi)/200;
        float r=0.04;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y );
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move6, 0.0f, 0.0f);
    glTranslatef(-0.62,0.01,0);
    glScalef(0.6,1,1);
    glColor3f(1.000, 1.000, 1.000);
    glBegin(GL_POLYGON);
    for(int i=0; i<200; i++)
    {
        float pi=3.1416;
        float A=(i*2*pi)/200;
        float r=0.01;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y );
    }
    glEnd();
    glPopMatrix();






    ////Bus////
    glPushMatrix();
    glTranslatef(_move2, 0.0f, 0.0f);
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0, 0.0);
    glVertex3f(0.5f, -0.166f, 0.0f);
    glVertex3f(1.0f, -0.166f, 0.0f);
    glVertex3f(1.0f, 0.0f, 0.0f);
    glVertex3f(0.55f, 0.0f, 0.0f);
    glVertex3f(0.5f, -0.033f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,1.0, 0.0);
    glVertex3f(0.5f, -0.1f, 0.0f);
    glVertex3f(0.5166f, -0.1f, 0.0f);
    glVertex3f(0.5166f, -0.066f, 0.0f);
    glVertex3f(0.5f, -0.066f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0, 0.0);
    glVertex3f(0.55f, 0.0f, 0.0f);
    glVertex3f(1.0f, 0.0f, 0.0f);
    glVertex3f(1.0f, 0.116f, 0.0f);
    glVertex3f(0.55f, 0.116f, 0.0f);
    glEnd();

    ////BusWindows////
    glBegin(GL_POLYGON);
    glColor3f(0.26,0.26, 0.26);
    glVertex3f(0.5833f, 0.016f, 0.0f);
    glVertex3f(0.633f, 0.016f, 0.0f);
    glVertex3f(0.633f, 0.1f, 0.0f);
    glVertex3f(0.5833f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.26,0.26, 0.26);
    glVertex3f(0.65f, 0.016f, 0.0f);
    glVertex3f(0.7f, 0.016f, 0.0f);
    glVertex3f(0.7f, 0.1f, 0.0f);
    glVertex3f(0.65f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.26,0.26, 0.26);
    glVertex3f(0.716f, 0.016f, 0.0f);
    glVertex3f(0.766f, 0.016f, 0.0f);
    glVertex3f(0.766f, 0.1f, 0.0f);
    glVertex3f(0.716f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.26,0.26, 0.26);
    glVertex3f(0.783f, 0.016f, 0.0f);
    glVertex3f(0.833f, 0.016f, 0.0f);
    glVertex3f(0.833f, 0.1f, 0.0f);
    glVertex3f(0.783f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.26,0.26, 0.26);
    glVertex3f(0.85f, 0.016f, 0.0f);
    glVertex3f(0.9f, 0.016f, 0.0f);
    glVertex3f(0.9f, 0.1f, 0.0f);
    glVertex3f(0.85f, 0.1f, 0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.26,0.26, 0.26);
    glVertex3f(0.916f, 0.016f, 0.0f);
    glVertex3f(0.966f, 0.016f, 0.0f);
    glVertex3f(0.966f, 0.1f, 0.0f);
    glVertex3f(0.916f, 0.1f, 0.0f);
    glEnd();
    glPopMatrix();



    ////BusWheels////
    glPushMatrix();
    glTranslatef(_move2+0.6, -0.2, 0.0);
    glColor3f(0.0,0.0,0.0);
    glBegin(GL_POLYGON);

    for(int i=0; i<600; i++)
    {
        float pi=3.1416;
        float A=(i*2*pi)/100;
        float r=0.06;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y);
    }
    glEnd();
    glPopMatrix();
    glPushMatrix();
    glTranslatef(_move2+0.6, -0.2, 0.0);
    glColor3f(1.0,1.0,1.0);
    glBegin(GL_POLYGON);

    for(int i=0; i<600; i++)
    {
        float pi=3.1416;
        float A=(i*2*pi)/100;
        float r=0.03;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y );
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move2+0.92, -0.2, 0.0);
    glColor3f(0.0,0.0,0.0);
    glBegin(GL_POLYGON);

    for(int i=0; i<600; i++)
    {
        float pi=3.1416;
        float A=(i*2*pi)/100;
        float r=0.06;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y );
    }
    glEnd();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(_move2+0.92, -0.2, 0.0);
    glColor3f(1.0,1.0,1.0);
    glBegin(GL_POLYGON);

    for(int i=0; i<600; i++)
    {
        float pi=3.1416;
        float A=(i*2*pi)/100;
        float r=0.03;
        float x = r * cos(A);
        float y = r * sin(A);
        glVertex2f(x,y );
    }
    glEnd();
    glPopMatrix();


    ////BuildingsFrontRow////

    ////1////
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(1.0,1.0,0.6);
    glVertex3f(-1.0f, -0.33f, 0.0f);
    glVertex3f(-0.66f,-0.33f,0.0f);
    glVertex3f(-0.66f,0.33f,0.0f);
    glVertex3f(-1.0f,0.33f,0.0f);
    glEnd();



    //4
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.6,0.2);
    glVertex3f(0.5f,-0.33f,0.0f);
    glVertex3f(0.833f,-0.33f,0.0f);
    glVertex3f(0.833f,0.33f,0.0f);
    glVertex3f(0.5f,0.33f,0.0f);
    glEnd();
    glPopMatrix();

    //Building windows

    //1
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.6,0.8);
    glVertex3f(-0.966f,0.166f,0.0f);
    glVertex3f(-0.833f,0.166f,0.0f);
    glVertex3f(-0.833f,0.25f,0.0f);
    glVertex3f(-0.966f,0.25f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.6,0.8);
    glVertex3f(-0.7833f,0.166f,0.0f);
    glVertex3f(-0.7f,0.166f,0.0f);
    glVertex3f(-0.7f,0.25f,0.0f);
    glVertex3f(-0.7833f,0.25f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.6,0.8);
    glVertex3f(-0.7833f,0.0f,0.0f);
    glVertex3f(-0.7f,0.0f,0.0f);
    glVertex3f(-0.7f,0.0833f,0.0f);
    glVertex3f(-0.7833f,0.0833f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.6,0.8);
    glVertex3f(-0.966f,0.0f,0.0f);
    glVertex3f(-0.833f,0.0f,0.0f);
    glVertex3f(-0.833f,0.0833f,0.0f);
    glVertex3f(-0.966f,0.0833f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.6,0.8);
    glVertex3f(-0.966f,-0.0833f,0.0f);
    glVertex3f(-0.833f,-0.0833f,0.0f);
    glVertex3f(-0.833f,-0.166f,0.0f);
    glVertex3f(-0.966f,-0.166f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.6,0.8);
    glVertex3f(-0.7833f,-0.0833f,0.0f);
    glVertex3f(-0.7f,-0.0833f,0.0f);
    glVertex3f(-0.7f,-0.166f,0.0f);
    glVertex3f(-0.7833f,-0.166f,0.0f);
    glEnd();


    //4
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.25,0.0);
    glVertex3f(0.583f,0.166f,0.0f);
    glVertex3f(0.65f,0.166f,0.0f);
    glVertex3f(0.65f,0.25f,0.0f);
    glVertex3f(0.583f,0.25f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.25,0.0);
    glVertex3f(0.683f,0.166f,0.0f);
    glVertex3f(0.75f,0.166f,0.0f);
    glVertex3f(0.75f,0.25f,0.0f);
    glVertex3f(0.683f,0.25f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.25,0.0);
    glVertex3f(0.583f,0.083f,0.0f);
    glVertex3f(0.65f,0.083f,0.0f);
    glVertex3f(0.65f,0.0f,0.0f);
    glVertex3f(0.583f,0.0f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.25,0.0);
    glVertex3f(0.683f,0.083f,0.0f);
    glVertex3f(0.75f,0.083f,0.0f);
    glVertex3f(0.75f,0.0f,0.0f);
    glVertex3f(0.683f,0.0f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.25,0.0);
    glVertex3f(0.583f,-0.083f,0.0f);
    glVertex3f(0.65f,-0.083f,0.0f);
    glVertex3f(0.65f,-0.166f,0.0f);
    glVertex3f(0.583f,-0.166f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.25,0.0);
    glVertex3f(0.683f,-0.083f,0.0f);
    glVertex3f(0.75f,-0.083f,0.0f);
    glVertex3f(0.75f,-0.166f,0.0f);
    glVertex3f(0.683f,-0.166f,0.0f);
    glEnd();


    //Trees
    glPushMatrix();
    glBegin(GL_POLYGON);
    glColor3f(0.6,0.298,0.0);
    glVertex3f(-0.6f,-0.33f,0.0f);
    glVertex3f(-0.566f,-0.33f,0.0f);
    glVertex3f(-0.566f,0.166f,0.0f);
    glVertex3f(-0.6f,0.166f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.6,0.298,0.0);
    glVertex3f(-0.1f,-0.33f,0.0f);
    glVertex3f(-0.066f,-0.33f,0.0f);
    glVertex3f(-0.066f,0.166f,0.0f);
    glVertex3f(-0.1f,0.166f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.6,0.298,0.0);
    glVertex3f(0.4f,-0.33f,0.0f);
    glVertex3f(0.433f,-0.33f,0.0f);
    glVertex3f(0.433f,0.166f,0.0f);
    glVertex3f(0.4f,0.166f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.6,0.298,0.0);
    glVertex3f(0.9f,-0.33f,0.0f);
    glVertex3f(0.933f,-0.33f,0.0f);
    glVertex3f(0.933f,0.166f,0.0f);
    glVertex3f(0.9f,0.166f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4,0.0);
    glVertex3f(-0.65f,-0.166f,0.0f);
    glVertex3f(-0.516f,-0.166f,0.0f);
    glVertex3f(-0.583f,-0.0f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4,0.0);
    glVertex3f(-0.15f,-0.166f,0.0f);
    glVertex3f(-0.016f,-0.166f,0.0f);
    glVertex3f(-0.0833f,-0.0f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4,0.0);
    glVertex3f(0.35f,-0.166f,0.0f);
    glVertex3f(0.483f,-0.166f,0.0f);
    glVertex3f(0.4166f,0.0f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.4,0.0);
    glVertex3f(0.85f,-0.166f,0.0f);
    glVertex3f(0.983f,-0.166f,0.0f);
    glVertex3f(0.9166f,0.0f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.4,0.8,0.0);
    glVertex3f(-0.65f,-0.05f,0.0f);
    glVertex3f(-0.516f,-0.05f,0.0f);
    glVertex3f(-0.583f,0.33f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.4,0.8,0.0);
    glVertex3f(-0.15f,-0.05f,0.0f);
    glVertex3f(-0.016f,-0.05f,0.0f);
    glVertex3f(-0.0833f,0.33f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.4,0.8,0.0);
    glVertex3f(0.35f,-0.05f,0.0f);
    glVertex3f(0.483f,-0.05f,0.0f);
    glVertex3f(0.4166f,0.33f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.4,0.8,0.0);
    glVertex3f(0.85f,-0.05f,0.0f);
    glVertex3f(0.983f,-0.05f,0.0f);
    glVertex3f(0.9166f,0.33f,0.0f);
    glEnd();
    glPopMatrix();

    //Boat
    glPushMatrix();
    glTranslatef(_move1,0.0f,0.0f);
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.0,0.4);
    glVertex3f(-0.833f,-0.66f,0.0f);
    glVertex3f(-0.33f,-0.66f,0.0f);
    glVertex3f(-0.25f,-0.583f,0.0f);
    glVertex3f(-0.916f,-0.583f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,1.0,0.4);
    glVertex3f(-0.833f,-0.583f,0.0f);
    glVertex3f(-0.33f,-0.583f,0.0f);
    glVertex3f(-0.416f,-0.5f,0.0f);
    glVertex3f(-0.75f,-0.5f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.4,0.0);
    glVertex3f(-0.66f,-0.5f,0.0f);
    glVertex3f(-0.5f,-0.5f,0.0f);
    glVertex3f(-0.583f,-0.33f,0.0f);
    glEnd();
    glBegin(GL_LINES);
    glColor3f(0.0,0.0,0.0);
    glVertex3f(-0.583f,-0.33f,0.0f);
    glVertex3f(-0.583f,-0.166f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0,0.0);
    glVertex3f(-0.583f,-0.283f,0.0f);
    glVertex3f(-0.55f,-0.25f,0.0f);
    glVertex3f(-0.583f,-0.2166f,0.0f);
    glEnd();

    //Boat Windows
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0,0.0);
    glVertex3f(-0.75f,-0.566f,0.0f);
    glVertex3f(-0.7f,-0.566f,0.0f);
    glVertex3f(-0.7f,-0.516f,0.0f);
    glVertex3f(-0.75f,-0.516f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0,0.0);
    glVertex3f(-0.633f,-0.566f,0.0f);
    glVertex3f(-0.583f,-0.566f,0.0f);
    glVertex3f(-0.583f,-0.516f,0.0f);
    glVertex3f(-0.633f,-0.516f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(1.0,0.0,0.0);
    glVertex3f(-0.516f,-0.566f,0.0f);
    glVertex3f(-0.46f,-0.566f,0.0f);
    glVertex3f(-0.46f,-0.516f,0.0f);
    glVertex3f(-0.516f,-0.516f,0.0f);
    glEnd();
    glBegin(GL_POLYGON);
    glColor3f(0.0,0.56,0.18);
    glVertex3f(-0.833f,-0.6833f,0.0f);
    glVertex3f(-0.33f,-0.6833f,0.0f);
    glVertex3f(-0.33f,-0.66f,0.0f);
    glVertex3f(-0.833f,-0.66f,0.0f);
    glEnd();

    glPopMatrix();

    glutSwapBuffers();
}



void update(int value)
{

    _move +=0.005f;
    if(_move-1.966 > 1.0)
    {
        _move = -1.0;
    }

    _move1 +=0.002f;
    if(_move1-1.993 > 1.0)
    {
        _move1 = -1.0;
    }

    _move2 -=0.01f;
    if(_move2+1.5 < -1.0)
    {
        _move2 = 1.0;
    }

    _move3 -=0.01f;
    if(_move3+1.966 < -1.0)
    {
        _move3 = 1.0;
    }

    _move4 +=0.0005f;
    if(_move4-1.39 > 1.0)
    {
        _move4 = -1.4;
    }

    _move5 +=0.0006f;
    if(_move5-0.79>1.0)
    {
        _move5 = -1.4;
    }


    _move6 +=0.01f;
    if(_move6-1.663 > 1.0)
    {
        _move6 = -1.0;
    }

    glutPostRedisplay();

    glutTimerFunc(25, update, 0);
}

int main(int argc, char** argv)
{
    glutInit(&argc, argv);
    glutInitDisplayMode(GLUT_DOUBLE | GLUT_RGB);
    glutInitWindowSize(1200, 1200);
    glutCreateWindow("Modern city scenario");
    glutDisplayFunc(drawScene);
    glutTimerFunc(27, update, 0);
    glutMainLoop();
    return 0;

}
