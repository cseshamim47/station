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

void bruteforce()
{}

void solve()
{
    int n,a,b,c;
    cin >> n >> a >> b >> c;
    int ans = 0;
    for(int i = 0; i <= 4000; i++)
    {
        for(int j = 0; j <= 4000; j++)
        {
            if((a*i)+(b*j) == n || (a*i) + (c*j) == n || (b*i) + (c*j) == n)
            {   
                ans = max(i+j,ans);   
            }
            if((a*i)+(b*j)+c == n)
            {   
                ans = max(i+j+1,ans);   
            }
            if((a*i) + (c*j) + b == n)
            {   
                ans = max(i+j+1,ans);   
            }
            if((b*i) + (c*j) + a == n)
            {   
                ans = max(i+j+1,ans);   
            }
        }
    }
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //bruteforce();
}