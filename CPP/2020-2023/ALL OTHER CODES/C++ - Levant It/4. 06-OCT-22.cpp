#include <iostream>
using namespace std;

#define sum(n) (n*(n+1))/2


void f1()
{
    int arr[]{1,2,3,4,5};

    for(int i = 0; i < 5; i++) cout << arr[i] << " ";
    cout << endl;

    cout << sizeof(arr)/sizeof(arr[0]) << endl;
}

void f2()
{
    int r = 3, c = 4;
    int arr[r][c];

    for(int i = 0; i < r; i++)
    {
        for(int j = 0; j < c; j++)
        {
            cin >> arr[i][j];
        }
    }

    for(int i = 0; i < r; i++)
    {
        for(int j = 0; j < c; j++)
        {
            cout << arr[i][j] << " ";
        }
        cout << endl;
    }
}


int global;
void fun(int age)
{
    global = 10;
    cout << "My age is : " << age << endl;
    return;
}

inline int Sum(int n)
{
    return (n*(n+1))/2;
}

string name(); /// prototyping

int main()
{
//    fun(25);
//    cout << global << endl;
//
//    cout << Sum(5) << endl;
//
//    cout << name() << endl;

    for(int t = 1; t <= 5; t++)
    {
        for(int i = 1; i <= 5; i++)
        {
            cout << "* ";
        }
        cout << endl;
    }

    cout << endl;

    for(int row = 1; row<=4; row++)
    {
        for(int col = 1; col <= row; col++)
        {
            cout << "*";
        }
        cout << endl;
    }
    return 0;
}



/// *
/// **
/// ***
/// ****
/// *****


string name()
{
    string str;
    cin >> str;
    return str;
}
