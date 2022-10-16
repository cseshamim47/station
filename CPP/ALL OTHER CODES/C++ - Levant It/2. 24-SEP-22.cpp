#include <iostream>
#include <math.h>
using namespace std;

#define debug cout << "I'm here" << endl;
#define print(x) cout << x << endl;
#define PI 3.1416 /// macro

void random()
{
    cout << "Hello World" << endl;
    cout << "My name is Md Shamim Ahmed" << endl;

    int intMx = pow(2,31)-1;

    cout << "Interer max value : " <<  intMx << endl;
    cout << "Interer max value : " <<  INT_MAX << endl;
    cout << "Interer min value : " <<  INT_MIN << endl;
}

void control()
{
    if(true)
    {
        /// kaj gula koro
    }else if(true == false)
    {
        /// true hole ekhane koro
    }else if(false)
    {
        ///
    }else
    {
        /// nahole ekhane eshe koro
        cout << "else block is working" << endl;
    }
}


void boolean()
{
    bool myBool = false;

    /// myBool == false
    /// ! = not false = true
    if(!myBool) cout << "If statement is running!!!" << endl;
    else cout << "MyBool is False" << endl;

    /// true = (1 or greater than 1) or (-1 or less than -1)
    /// !15 = 0
    /// !0 === true
    if(0) cout << "If is running" << endl;
    else cout << "Else is running" << endl;
}

/// global variable

int globalVar1; /// initialized to 0
int globalVar2 = 10;


/// constant
const double pi = 3.1416; /// floor

int main()
{

    /// bool, int INT_MAX, INT_MIN
    int _bool = 19; /// cannot write as bool

    /// local variable
    /// what is scope?
    /// same named variable can be declared within different scope
    { /// 1st scope
        int x;
        { /// 2nd scope
            int y = 10;
            { /// 3rd scope

                cout << y << endl;
            }
        }
        /// this is a scope
    }

    int a = 10;

    {
        int t = 15;
    //        cout << t << endl;
    ///       globalVar1 = globalVar1 + 15;
        globalVar1 += 15;
        globalVar1 += 5;
        cout << "Global Variable 1 : " << globalVar1 << endl;
    }

    cout <<"Global Variable 2 : " << globalVar2 << endl;


    ///    pi += 3; // cannot modify

    cout << "Value of PI : " << pi << endl;

    /// PI += 3; /// cannot modify defined Macro
    cout << "Value of PI(defined) : " << PI << endl;

}
