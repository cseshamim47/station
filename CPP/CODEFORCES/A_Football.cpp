#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;

    string str[n];
    for(int i = 0; i < n; i++){
        cin >> str[i];
    }
    string a = str[0];
    string b;
    int teamA = 0;
    for(int i = 0; i < n; i++){
        if(str[i] == a) teamA++;
        else{
            b = str[i];
        }
    }
    int teamB = n - teamA;    
    // cout << teamA << " " << teamB << endl;
    if(teamA > teamB) cout << a << endl;
    else cout << b << endl;
}