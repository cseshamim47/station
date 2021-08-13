#include <bits/stdc++.h>
using namespace std;

int main()
{
    int levels;
    cin >> levels;
    int chk[levels+1] = {0};
    chk[0] = 101;
    int t,x,y;
    cin >> t;
    for(int i = 1; i <= t; i++){
        cin >> x;
        chk[x]=1;
    }
    cin >> t;
    for(int i = 1; i <= t; i++){
        cin >> y;
        chk[y] = 1;
    }    
    sort(chk,chk+levels+1);
    // for(auto x : chk) cout << x << " ";
    if(chk[0] == 1) cout << "I become the guy.\n";
    else cout << "Oh, my keyboard!\n"; 
}