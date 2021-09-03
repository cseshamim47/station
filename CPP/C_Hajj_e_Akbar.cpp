#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{}

int main()
{
      //        Bismillah
    // w(t)
    string str;
    int i = 1;
    while(cin >> str)
    {
        if(str == "*") break;
        cout << "Case " << i << ": ";
        if(str == "Hajj") cout << "Hajj-e-Akbar" << "\n";
        else cout << "Hajj-e-Asghar" << "\n";
        i++;
    }    
}