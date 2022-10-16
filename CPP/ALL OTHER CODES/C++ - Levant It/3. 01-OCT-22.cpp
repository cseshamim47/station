#include <bits/stdc++.h>
using namespace std;

#define deb printf("I'm Here\n");

int main()
{
    int n;
    cout << "Enter array size : ";
    cin >> n;
    int roll[n]{0,1,2};

    cout << "Enter " << n << " values : ";
    for(int i = 0; i < n; i++)
    {
        cin >> roll[i];
    }

    //roll[3] = roll[3] + 10;
    roll[3] += 10;

//    roll[0] = 1;
//    roll[1] = 2;
//    roll[2] = 40;
//    roll[3] = 31;
//    roll[4] = 101;

    /// for, while, do while, goto, recursion

    /// for(init;condition;manipulation)
    /// 1,2,3,4,5

    for(int i = 0; i <= n-1; i = i + 1)
    {
        cout << roll[i] << endl;
    }

















    /// operator -> assignment ( = )
    char a = 'A';
    char b = 'B';
    char c('C');

    auto var = "Taiyaba";
    cout << var << endl;

    cout << "Enter your age : ";
    int age;
    cin >> age;

    getchar(); /// Sol 1
//    cin.ignore(numeric_limits<streamsize>::max(), '\n');

    cout << "Enter your name : ";
    string name;
    getline(cin,name);


    cout << "Your age : " << age << endl;
    cout << "Your name : " << name << endl;


//    cout << b << endl;
//    cout << c << endl;

}
