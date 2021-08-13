#include <bits/stdc++.h>
using namespace std;

int main()
{
    string s = "Shamim Ahmed";

    for(char x : s){
        cout << x << " ";
    }
    cout << endl;
    for(auto it = s.begin(); it != s.end(); it++) cout << *it << " ";

    cout << endl;
}