#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

int c;
void solve()
{
    int m,l;
    cin >> m >> l;
    int openClose = 9;
    int enter = 10;
    int move = 0;
    if(m > l) move = (m-l)*4, l = m;
    move += l*4;
    int ans = move+enter+openClose;
    cout << "Case " << ++c << ": " << ans << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}