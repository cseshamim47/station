#include <iostream>

using namespace std;

int main()
{

    int a=0;
    int b=0;
    int temp=0;
    int userInput;
    cout << "Input your first integer A : " ;
    cin >> a;
    cout << "Input your second integer B : " ;
    cin >> b;
    cout << "Press-1 to swap the values \nPress-2 to check whether the input values are multiples of 2\nPress-3 to represent the two input as a range" << endl;
    cin >> userInput;

    if ( userInput == 1 ){

        cout << "Previous value of A : " << a << endl;
        cout << "Previous value of B : " << b << endl;
        temp = b;
        b = a;
        a = temp;
        cout << "Swapped value of A : " << a << endl;
        cout << "Swapped value of B : " << b << endl;
    }else if ( userInput == 2 ) {
        if (a % 2 == 0){
            cout << "A can be multiples of 2" << endl;
        }else
        cout << "A cannot be multiples of 2" << endl;

        if (b % 2 == 0){
            cout << "B can be multiples of 2" << endl;
        }else
        cout << "B cannot be multiples of 2" << endl;
    }else if ( userInput == 3 ) {
        if(a>b){
        cout << "The range of A to B (smallest to highest) : " << b << " - " << a << endl;
    }else {
        cout << "The range of A to B (highest to smallest) : " << a << " - " << b << endl;
    }
    }else
        cout << "Wrong input." << endl;

}




