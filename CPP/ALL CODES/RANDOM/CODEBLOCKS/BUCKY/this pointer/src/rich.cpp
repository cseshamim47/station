#include <iostream>
#include "rich.h"
using namespace std;

rich::rich(int Var)
:x(Var)
{
}

void rich::printKor(){

cout << "x= " << x << endl;
cout << "this->x= " << this->x << endl;         //explicitly calling
cout << "(*this).x= " << (*this).x << endl;     //also explicitly calling ~
                                                //  This is called
                                                //  dereferncing a pointer
}
