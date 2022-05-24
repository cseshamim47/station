#include <bits/stdc++.h>
using namespace std;

#define sq(x)   (x)*(x)
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void solve()
{
    int a,b;
    cin >> a >> b;

    int ans = b - a;

    int idx = -1;

    bitset<32> bitA(a);
    bitset<32> bitB(b);

    for(int i = 0; i < 32; i++)
    {
        if(bitA[i] == 1 && bitB[i] == 0) idx = i;
    }

    int p = 0, q = 0;
    if(idx==-1 && ans != 0) ans = 1;
    
    for(int i = 0; i <= idx; i++)
    {
        if(bitA[i]) p += pow(2,i);
        if(bitB[i]) q += pow(2,i);
    }
    ans = min(ans,p-q+1);

    int x = 0;
    for(int i = idx+1; i < 32; i++)
    {
        if(!bitA[i] && bitB[i])
        {
            x = pow(2,i);
            ans = min(ans,x-p+1);
        }
        if(bitA[i]) p += pow(2,i);
    }

    cout << ans << endl;    


}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}