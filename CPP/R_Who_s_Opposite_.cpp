#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int a,b,c;
    cin >> a >> b >> c;
    int n = abs(b-a)*2;
    int d = abs(a-b);
    if(a > n || b > n || c > n)
    {
        cout << -1 << endl;
    }else
    {
        if(c > d) cout << c-d << endl;
        else cout << c+d << endl;
    }
}

int main()
{
      //        Bismillah
    w(t)
    
}