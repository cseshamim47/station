#include <iostream>

using namespace std;

int main()
{
    int press;
    cout << "Press-1 to see the syntax of declaring a variable" << endl;
    cout << "Press-2 to see the syntax of using an if() block" << endl;
    cout << "Press-3 to see how you can print the address of a variable" << endl;
    cout << "Press-4 to see the logic that can be used to determine whether a value is odd or even" << endl;
    cout << endl;
    cin >> press;
    cout << endl;

    switch(press){
        case 1:
            cout << "   int a;\n   a = 10;" << endl;
            break;

        case 2:
            cout << "\n   if (condition){\n      // block of code to be executed if the condition is true\n   }" << endl;
            break;
        case 3:
            cout << "   int x; \n   cout << &x << endl;" << endl;
            break;

        case 4:
            cout << "   if(a%2 == 0) {\n      cout << ''This is an even number'' << endl;\n   }else\n      cout << ''This is an odd Number''; " << endl;
            break;
        default:
            cout << "Wrong key pressed!!!!" << endl;
    }


}
