#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n , k;
    cin >> n >> k;
    int a[n],b[n];
    int cntA = 0, cntB = 0;
    int mx = 0;
    for(int i = 0; i < n; i++) 
    {
        cin >> a[i];
        mx = max(mx,a[i]);
    }
    int f1[mx+1]={0};
    mx = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> b[i];
        mx = max(mx,b[i]);    
    } 
    int f2[mx+1]={0};

    for(int i = 0; i < n; i++)
    {
        int p = a[i];
        int q = k-p;
        if(q < 0) continue;
        cntA += f1[q];
        f1[p]++;
    }

    for(int i = 0; i < n; i++)
    {
        int p = b[i];
        int q = k-p;
        if(q < 0) continue;
        cntB += f2[q];
        f2[p]++;
    }

    if(cntA > cntB) cout << "Mahmoud" << endl;
    else if(cntA < cntB) cout << "Bashar" << endl;
    else cout << "Draw" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();    
}