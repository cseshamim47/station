#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int a , b;
    cin >> a >> b;
    if(a < b) swap(a,b);
    int ans = 0,idx = 0;
    
    if(a == b) cout << 0 << endl;
    else if(a/2 > b)
    {
        if(a % 2 == 0)
        {
            cout << (a/2)-1 << endl;
        }
        else cout << a/2 << endl;
    }
    else
    {
        int a1 = a % b;
        b++;
        int b1 = a % b;
        cout << max(a1,b1) << endl;
    }
}

int main()
{
      //        Bismillah
    w(t)
    
}