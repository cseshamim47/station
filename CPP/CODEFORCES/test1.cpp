#include <iostream>
using namespace std;

int main()
{
    string x = "7";
    int count = 0;
    for(int i = 0; i < x.length(); i++){
        if(x[i]!=4 || x[i]!=7) {count++;}
    }
    cout << count << endl;
    cout << x[2];
}