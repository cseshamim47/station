// 1 I hate it
// 2 I hate that I love it
// 3 I hate that I love that I hate it
// 4 I hate that I love that I hate that I love it

//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){}

int main()
{
      //        Bismillah
     // int t;   cin >> t;   w(t);
    int n;
    cin >> n;
    string hate = "I hate it";
    if(n==1){
        cout << hate << "\n";
        return 0;
    }

    hate = "I hate";
    string love = "I love";
    int i;
    for(i = 1; i < n; i++){
        if(i & 1) 
            cout << hate << " that ";
        if(!(i&1)) 
            cout << love << " that ";
    }
    if(i&1) cout << hate << " it" << "\n";
    else cout << love << " it" << "\n";

}