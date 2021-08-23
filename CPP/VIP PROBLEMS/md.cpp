#include <bits/stdc++.h>
using namespace std;

int main()
{
    int dplan,n,usage,remBal;

    cin >> dplan >> n;
    remBal = dplan;
    for(int i = 0; i < n; i++){
        cin >> usage;
        remBal = remBal - usage+dplan; // 
    }

    cout << remBal << endl;
    
}